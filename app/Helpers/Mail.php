<?php
namespace App\Helpers;

class Mail {

    public static function setMailContent($template, $customer, $slogan = '') 
    {
        //Tính giá trị mới bằng giá trị cũ - 10%
        $price_vat='';
        $price=explode(",", $customer->price);
        foreach($price as $pr){
            $price_vat.=$pr;
        }
        $price=intval($price_vat);
        $price_vat=$price+ceil(($price*10)/100);
        $price_vat= number_format($price_vat);
        
        $customer_datecreated=date("d/m/Y",strtotime($customer->datecreated));
        $customer_dateexpired=date("d/m/Y",strtotime($customer->dateexpired));
        $customer_type = $customer->category ? $customer->category->title : '';
        $service = $customer->services;
        $customer = $customer->customer;
        $contact = $customer->contact;
        $note = $customer->note;
        $email = $customer->email;
        $phone = $customer->phone;

        $subject=$template->title;
        $subject=str_replace("{category}", strtoupper($customer_type), $subject);
        $subject=str_replace("{datecreated}",$customer_datecreated,$subject);
        $subject=str_replace("{dateexpired}",$customer_dateexpired,$subject);
        $subject=str_replace("{project}",$service,$subject);
        $subject=str_replace("{customer}",$customer,$subject);
        $subject=str_replace("{contact}",$contact,$subject);
        $subject=str_replace("{price}",$price_vat,$subject);
        $subject=str_replace("{note}",$note,$subject);
        $subject=str_replace("{email}",$email,$subject);
        $subject=str_replace("{phone}",$phone,$subject);
        $subject=str_replace("{STATUS}",$slogan,$subject);

        $content=$template->content;
        $re=str_replace("{datecreated}",$customer_datecreated,$content);
        $re=str_replace("{dateexpired}",$customer_dateexpired,$re);
        $re=str_replace("{category}",strtoupper($customer_type),$re);
        $re=str_replace("{project}",$service,$re);
        $re=str_replace("{customer}",$customer,$re);
        $re=str_replace("{contact}",$contact,$re);
        $re=str_replace("{price}",$price_vat,$re);
        $re=str_replace("{note}",$note,$re);
        $re=str_replace("{email}",$email,$re);
        $re=str_replace("{phone}",$phone,$re);
        $re=str_replace("{STATUS}",$slogan,$re);

        $emails = $email ? explode(',', $email) : [];
        $email_send =  '';
        if(count($emails) > 0) {
            $email_send = $emails[0];
            unset($emails[0]);
        }
        $emails_cc = $emails;
        
        return [
            'email' => $email_send,
            'cc' => $emails_cc,
            'content' => $re,
            'subject' => $subject
        ];     
    }

    public static function sendMail($mail_info, $config_email_cc = []) 
    {
        $mailcc = array_merge($mail_info['cc'], $config_email_cc);
        \Mail::send(['html' => 'mail'], $mail_info, function ($message) use ($mail_info, $mailcc)
        {
            $message->subject($mail_info['subject']);
            $message->from('no-reply@tqdesign.vn', 'TQ Tecom');
            $message->to(trim($mail_info['email']));
            if(count($mailcc)) {
                $message->cc($mailcc);
            }
        });
    }
}