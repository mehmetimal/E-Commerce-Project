<?php


namespace App\Services;


use App\Models\Shop;
use App\Models\Variant;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Iyzipay\Model\BasketItem;


class IyzicoService
{

    public function initializeOptions(){
        $options = new \Iyzipay\Options();
        $options->setApiKey(Config::get('services.iyzico.apiKey'));
        $options->setSecretKey(Config::get('services.iyzico.secretKey'));
        $options->setBaseUrl(Config::get('services.iyzico.baseUrl'));

        return $options;
    }


    public  function  initializePayment($price,$basket_id){

        $iyzico_payment = new \Iyzipay\Request\CreatePaymentRequest();
        $iyzico_payment->setLocale(\Iyzipay\Model\Locale::TR);
        $iyzico_payment->setConversationId("123456789");
        $iyzico_payment->setPrice(\Cart::subTotal());
        $iyzico_payment->setPaidPrice($price);
        $iyzico_payment->setCurrency(\Iyzipay\Model\Currency::TL);
        $iyzico_payment->setInstallment(1);
        $iyzico_payment->setBasketId($basket_id);
        $iyzico_payment->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $iyzico_payment->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);


        return $iyzico_payment;

    }
public  function initializePaymentCard($payment_card_owner,$cardNumber,$mounth,$year,$cvc){

    $paymentCard = new \Iyzipay\Model\PaymentCard();
    $paymentCard->setCardHolderName($payment_card_owner);
    $paymentCard->setCardNumber($cardNumber);
    $paymentCard->setExpireMonth($mounth);
    $paymentCard->setExpireYear($year);
    $paymentCard->setCvc($cvc);
    $paymentCard->setRegisterCard(0);
    return $paymentCard;


}

public  function initializeBuyer($userId,$name,$surname,$phone,$email,$province,$description){

    $buyer = new \Iyzipay\Model\Buyer();
    $buyer->setId($userId);
    $buyer->setName($name);
    $buyer->setSurname($surname);
    $buyer->setGsmNumber($phone);
    $buyer->setEmail($email);
    $buyer->setIdentityNumber("74300864791");

    $buyer->setRegistrationAddress($description);
    $buyer->setIp(request()->getClientIp());
    $buyer->setCity($province);
    $buyer->setCountry("Turkey");

    return $buyer;
}
public  function initializeShippmentAddres($name,$province,$description){

    $shippingAddress = new \Iyzipay\Model\Address();
    $shippingAddress->setContactName($name);
    $shippingAddress->setCity($province);
    $shippingAddress->setCountry("Turkey");
    $shippingAddress->setAddress($description);
    return $shippingAddress;
}
public  function initializeBillingAddress(){
    $billingAddress = new \Iyzipay\Model\Address();
    $billingAddress->setContactName("Jane Doe");
    $billingAddress->setCity("Istanbul");
    $billingAddress->setCountry("Turkey");
    $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
   return$billingAddress;

}
public  function initializeBasketItems(){
    $piece = 0;

    foreach (\Cart::content() as $item) {
        $variant = Variant::with('product.shop.detail')->where('barcode',$item->id)->first();

        $price=$item->price *$item->qty;
        $paidPrice =$price - ((double)($price/100)*($variant->product->shop->detail->commission_rate));
        $BasketItem = new BasketItem();
        $BasketItem->setId($item->id);
        $BasketItem->setName($item->name);
        $BasketItem->setCategory1("Product");
        $BasketItem->setSubMerchantKey($variant->product->shop->detail->shop_key);
        $BasketItem->setSubMerchantPrice($paidPrice);
        $BasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $BasketItem->setPrice($price);
        $basketItems[$piece] = $BasketItem;
        $piece++;
    }
    return $basketItems;
}
public function  createPersonalShop($user_id,$nick_name,$name,$image,$address,$Iban,$IdentityNumber,$rate){
    DB::beginTransaction();
    try {
        $shop = Shop::create([
            'user_id' => $user_id,
            'nick_name' => $nick_name,
            'name' => $name,
        ]);


        $shop->addMedia($image)->toMediaCollection('shop_logos');

        $shop = Shop::where('id',$shop->id) ->with('user','user.detail')->first();

        $options = $this->initializeOptions();
        $request = new \Iyzipay\Request\CreateSubMerchantRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantExternalId($shop->id);
        $request->setSubMerchantType(\Iyzipay\Model\SubMerchantType::PERSONAL);
        $request->setAddress($address);
        $request->setContactName($shop->user->detail->name);
        $request->setContactSurname($shop->user->detail->surname);
        $request->setEmail($shop->user->email);
        $request->setGsmNumber($shop->user->detail->phone);
        $request->setName($name);
        $request->setIban($Iban);
        $request->setIdentityNumber($IdentityNumber);
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        # make request
        $subMerchant = \Iyzipay\Model\SubMerchant::create($request, $options);

        if ($subMerchant->getStatus() =='success'){
            $key = $subMerchant->getSubMerchantKey();

            $shop->detail()->create([
                'address'=>$address,
                'Iban'=>$Iban,
                'IdentityNumber'=>$IdentityNumber,
                'shop_type'=>1,
                'shop_key'=>$key,
                'commission_rate'=>$rate
            ]);
        DB::commit();
        return true ;
        }



    }catch (\Exception $exception){

        Log::critical($exception->getMessage()); ;
        DB::rollback();
    }

}

public function createPrivateShop($user_id, $nick_name, $name, $image, $address, $Iban, $IdentityNumber, $rate, $taxOffice, $legalCompanyName){

    DB::beginTransaction();
    try {
        $shop = Shop::create([
            'user_id' => $user_id,
            'nick_name' => $nick_name,
            'name' => $name,
        ]);

        $shop->addMedia($image)->toMediaCollection('shop_logos');

        $shop = Shop::where('id', $shop->id)->with('user', 'user.detail')->first();

        $options = $this->initializeOptions();
        $request = new \Iyzipay\Request\CreateSubMerchantRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantExternalId($shop->id);
        $request->setSubMerchantType(\Iyzipay\Model\SubMerchantType::PRIVATE_COMPANY);
        $request->setAddress($address);
        $request->setTaxOffice($taxOffice);
        $request->setLegalCompanyTitle($legalCompanyName);
        $request->setEmail($shop->user->email);
        $request->setGsmNumber($shop->user->detail->phone);
        $request->setName($name);
        $request->setIban($Iban);
        $request->setIdentityNumber($IdentityNumber);
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        # make request
        $subMerchant = \Iyzipay\Model\SubMerchant::create($request, $options);


        if ($subMerchant->getStatus() =='success'){

            $key = $subMerchant->getSubMerchantKey();

            $shop->detail()->create([
                'address'=>$address,
                'Iban'=>$Iban,
                'IdentityNumber'=>$IdentityNumber,
                'shop_type'=>2,
                'shop_key'=>$key,
                'commission_rate'=>$rate,
                'tax_office'=>$taxOffice,
                'legal_company_title'=>$legalCompanyName
            ]);

            DB::commit();

            return true ;
        }
    }catch (\Exception $exception){

        DB::rollBack();
    }
}

public function createLimitedShop($user_id, $nick_name, $name, $image, $address, $Iban, $rate,$legalCompanyName,$taxNumber, $taxOffice ){

        DB::beginTransaction();
    try {
        $shop = Shop::create([
            'user_id' => $user_id,
            'nick_name' => $nick_name,
            'name' => $name,
        ]);

        $shop->addMedia($image)->toMediaCollection('shop_logos');

        $shop = Shop::where('id', $shop->id)->with('user', 'user.detail')->first();

        $options = $this->initializeOptions();

        # create request class
        $request = new \Iyzipay\Request\CreateSubMerchantRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("123456789");
        $request->setSubMerchantExternalId($shop->id);
        $request->setSubMerchantType(\Iyzipay\Model\SubMerchantType::LIMITED_OR_JOINT_STOCK_COMPANY);
        $request->setAddress($address);
        $request->setTaxOffice($taxOffice);
        $request->setTaxNumber($taxNumber);
        $request->setLegalCompanyTitle($legalCompanyName);
        $request->setEmail($shop->user->email);
        $request->setGsmNumber($shop->user->detail->phone);
        $request->setName($name);
        $request->setIban($Iban);
        $request->setCurrency(\Iyzipay\Model\Currency::TL);

        # make request
        $subMerchant = \Iyzipay\Model\SubMerchant::create($request, $options);

        if ($subMerchant->getStatus() =='success'){

            $key = $subMerchant->getSubMerchantKey();

            $shop->detail()->create([
                'address'=>$address,
                'Iban'=>$Iban,
                'shop_type'=>3,
                'shop_key'=>$key,
                'commission_rate'=>$rate,
                'tax_office'=>$taxOffice,
                'tax_number'=>$taxNumber,
                'legal_company_title'=>$legalCompanyName
            ]);

            DB::commit();

            return true ;
        }


    }catch (\Exception $exception){


        DB::rollBack();
    }
}
    public  function approveItem($transaction_id){
            $options = $this->initializeOptions();
            $request = new \Iyzipay\Request\CreateApprovalRequest();
            $request->setLocale(\Iyzipay\Model\Locale::TR);
            $request->setConversationId("123456789");
            $request->setPaymentTransactionId($transaction_id);
            $approval = \Iyzipay\Model\Approval::create($request, $options);

            if ($approval->getStatus()=='success'){
                $item = \App\Models\BasketItem::where('transaction_id',$transaction_id)->first();
                $item->update(['is_applied'=>1]);
                return true;
            }

    }
}
