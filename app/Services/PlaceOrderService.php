<?php


namespace App\Services;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserDetail;
use App\Models\Variant;
use Dflydev\DotAccessData\Data;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\BasketItem;

class PlaceOrderService
{

    public function getBuyerAddressAndId($hasRequestAddressId, $address_id, $name, $surname, $phone, $description, $province, $district, $email)
    {
        //Kullanıcı Üye Mi ?
        if (Auth::check()){
            //Kullanıcı Kayıtlı Adreslerinden Mi Seçti
            if ($hasRequestAddressId){

                //Sectiyse Kayıtlı Adresi getir ve Siparis ADRESİ olarak Ata

                $address = $this->getUserEmailAndId($address_id);
                $result=['address'=>$address,'user_id'=>Auth::id(),'email'=>Auth::user()->email];

                return  json_decode(json_encode($result));
            }else{

                //Kayıtlı Adreslerinden Seçmediyse Formdan gelen bilgilerle Formu Doldur
                $address = $this->initilazeAdrressFromForm($name,$surname,$phone,$description,$province,$district);

                $result=['address'=>$address,'user_id'=>Auth::id(),'email'=>Auth::user()->email];

                return  json_decode(json_encode($result));

            }

        }else{

            //Email Adresi Kartta Zorunlu Oldugundan Email ve İd Olustur

            $user = $this->createUserEmailForUserId($email);

            $userId=$user->id;

            $email = $user->email;

            //Formdan Gelen Değerlerle Adres Olustur

            $address = $this->initilazeAdrressFromForm($name, $surname, $phone, $description, $province, $district);

            $result=['address'=>$address,'user_id'=>$userId,'email'=>$email];

            return  json_decode(json_encode($result));
        }

    }
   public  function getUserEmailAndId($user_address_id){

       return UserAddress::where('id',$user_address_id)->first();

   }
   public function createUserEmailForUserId($email){

       $user =  User::firstOrCreate(
           ['email' => $email],
           ['password' => Hash::make(Str::random(8))]

       );
       //$user->assignRole(2);

       $user->detail()->save(new UserDetail());

       return $user;



   }
public function  initilazeAdrressFromForm($name,$surname,$phone,$description,$province,$district){
    $address=[
        'name'=>$name,
        'surname'=>$surname,
        'phone'=>$phone,
        'description'=>$description,
        'province'=>$province,
        'district'=>$district
     ];
    return  json_decode(json_encode($address));
}


    public  function storeOrder($price, $address, $basket_id, $payment_method, $bank, $installment){

        try {

            $basket = Basket::find($basket_id);


            foreach (\Cart::content() as $item) {





                BasketItem::create([
                    'basket_id'=>$basket_id,
                    'name'=>$item->name .' '.$item->options->product_name,
                    'qty'=>$item->qty,
                    'price'=>$item->price,
                    'is_refunded'=>0,
                    'image_url'=>$item->options->images
                ]);
            }


            $order = Order::create([
                'basket_id'=>$basket_id,
                'price'=>$price,
                'phone'=>$address->phone,
                'name'=> $address->name,
                'surname'=> $address->surname,
                'province'=>$address->province,
                'district'=>$address->district,
                'description'=>$address->description,
                'order_type'=>$payment_method,
                'bank'=>$bank,
                'installment'=>$installment,
                'state'=>'Sipariş Alındı',
            ]);


            $basket->update(['is_delivered' =>1 ]);

            return $order;
        }catch (\Exception $exception){


           dd($exception);

        }

    }

    public function placeOrderCredit($price,$basket_id,$cardOwner,$cardNumber,$cardMonth,$cardYear,$cvc,$address,$userId,$email){

        $iyzicoService =new IyzicoService();

        $options = $iyzicoService->initializeOptions();

        $iyzico_payment = $iyzicoService->initializePayment($price,$basket_id);

        $paymentCard = $iyzicoService->initializePaymentCard($cardOwner,$cardNumber,$cardMonth,$cardYear,$cvc);

        $iyzico_payment->setPaymentCard($paymentCard);

        $buyer=$iyzicoService->initializeBuyer($userId,$address->name,$address->surname,$address->phone,$email,$address->province,$address->description);

        $iyzico_payment->setBuyer($buyer);

        $shippingAddress = $iyzicoService->initializeShippmentAddres($address->name,$address->province,$address->description);

        $iyzico_payment->setShippingAddress($shippingAddress);

        $billingAddress = $iyzicoService->initializeBillingAddress();

        $iyzico_payment->setBillingAddress($billingAddress);

        $basketItems=$iyzicoService->initializeBasketItems();

        $iyzico_payment->setBasketItems($basketItems);

        $payment_result  = \Iyzipay\Model\Payment::create($iyzico_payment, $options);


        if ($payment_result->getStatus() =='success'){
            $order = $this->storeOrder(
                $payment_result->getPaidPrice(),
                $address,$payment_result->getBasketId(),
                2,$payment_result->getCardFamily(),
                1);
            return  $order;
        }else{
            return $payment_result->getErrorMessage();
        }

    }


    public  function fillBasket($user_id){

        $basket_id = Basket::firstOrCreate(
            ['user_id'=>$user_id,'is_delivered'=>0]
        )->id;

        return $basket_id;
    }

    public  function processVariantIsAllReadyAviable(){

        foreach (\Cart::content() as $item ){

            $variant =  Variant::with('product')->where('barcode',$item->id)->first();

            if ($item->qty > $variant->quantity){

                return "Bu Üründen   ". $item->qty .'  Adet  ' . "  Alınamaz Az Önce BİR Kısmı Satılmış".'Alınabilecek Adet   '
                    .$variant->quantity.'   Sepetinizi Güncelleyin';
            }

            if ($variant->quantity <= 0 || $variant->is_sold ==1){

            return "Üzgünüz Bu Urun Az Önce Satıldı . Satın Alınamaz ";

            }else{
                $variant->quantity = $variant->quantity - $item->qty ;

                $product = Product::where('id',$variant->product->id)->first();

                $product->quantity =$product->quantity - $item->qty;

                $product->update();

                if ($variant->quantity <= 0  ){
                    $variant->is_sold = 1;
                }
                $variant->update();

            }

        }
    }
}
