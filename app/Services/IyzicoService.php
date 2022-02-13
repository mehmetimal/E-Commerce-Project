<?php


namespace App\Services;


use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
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

        $BasketItem = new BasketItem();

        $BasketItem->setId($item->id);
        $BasketItem->setName($item->name);
        $BasketItem->setCategory1("ÜRÜN");
        $BasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $BasketItem->setPrice($item->price * $item->qty);
        $basketItems[$piece] = $BasketItem;

        $piece++;
    }
    return $basketItems;
}
public function  createPersonalShop(Request $formRequest,$shop_id){

    $options = $this->initializeOptions();


    $shop = Shop::where('id',$shop_id)->first();

    $shop->detail()->create([
        'address'=>$formRequest->address,
        'Iban'=>$formRequest->Iban,
        'IdentityNumber'=>$formRequest->IdentityNumber,
        'shop_type'=>1
    ]);

    $shop = Shop::where('id',$shop_id) ->with('user','detail')->first();

    $request = new \Iyzipay\Request\CreateSubMerchantRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");
    $request->setSubMerchantExternalId($shop->id);
    $request->setSubMerchantType(\Iyzipay\Model\SubMerchantType::PERSONAL);
    $request->setAddress($shop->detail->address);
    $request->setContactName('Mehmet');
    $request->setContactSurname('İMAL');
    $request->setEmail($shop->user->email);
    $request->setGsmNumber('05453747823');
    $request->setName($shop->name);
    $request->setIban($shop->Iban);
    $request->setIdentityNumber($shop->detail->IdentityNumber);
    $request->setCurrency(\Iyzipay\Model\Currency::TL);

    # make request
    $subMerchant = \Iyzipay\Model\SubMerchant::create($request, $options);
    dd($subMerchant);
    # print result
   return $subMerchant;
}
public function createPrivateShop($shop_id){
    $options = $this->initializeOptions();

    $shop = Shop::where('id',$shop_id)->first();

    $request = new \Iyzipay\Request\CreateSubMerchantRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");
    $request->setSubMerchantExternalId($shop->id);
    $request->setSubMerchantType(\Iyzipay\Model\SubMerchantType::PRIVATE_COMPANY);
    $request->setAddress($shop->address);
    $request->setTaxOffice($shop->taxOffice);
    $request->setLegalCompanyTitle($shop->legalCompanyName);
    $request->setEmail($shop->email);
    $request->setGsmNumber($shop->phone);
    $request->setName($shop->name);
    $request->setIban($shop->Iban);
    $request->setIdentityNumber($shop->IdentityNumber);
    $request->setCurrency(\Iyzipay\Model\Currency::TL);

    # make request
    $subMerchant = \Iyzipay\Model\SubMerchant::create($request, $options);

    # print result
    return $subMerchant;
}


public function createLimitedShop($shop_id){
    $options = $this->initializeOptions();
    $shop = Shop::where('id',$shop_id)->first();

    # create request class
    $request = new \Iyzipay\Request\CreateSubMerchantRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");
    $request->setSubMerchantExternalId($shop->id);
    $request->setSubMerchantType(\Iyzipay\Model\SubMerchantType::LIMITED_OR_JOINT_STOCK_COMPANY);
    $request->setAddress($shop->address);
    $request->setTaxOffice($shop->taxOffice);
    $request->setTaxNumber($shop->taxNumber);
    $request->setLegalCompanyTitle($shop->legalCompanyName);
    $request->setEmail($shop->email);
    $request->setGsmNumber($shop->phone);
    $request->setName($shop->name);
    $request->setIban($shop->Iban);
    $request->setCurrency(\Iyzipay\Model\Currency::TL);

    # make request
    $subMerchant = \Iyzipay\Model\SubMerchant::create($request, $options);

    # print result
   return $subMerchant;
}





}
