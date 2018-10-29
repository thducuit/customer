<?php
namespace App\Helpers;

class Mail {
	public static function mail_content($template, $management, $slogan = '') {
        //Tính giá trị mới bằng giá trị cũ - 10%
        $price_vat='';
        $price=explode(",", $management->price);
        foreach($price as $pr){
            $price_vat.=$pr;
        }
        $price=intval($price_vat);
        $price_vat=$price+ceil(($price*10)/100);
        $price_vat= number_format($price_vat);

        $management_datecreated=date("d/m/Y",strtotime($management->datecreated));
        $management_dateexpired=date("d/m/Y",strtotime($management->dateexpired));
        $management_type = $management->category ? $management->category->title : '';
        $service = $management->services;
        $customer = $management->customer;
        $contact = $management->contact;
        $note = $management->note;
        $email = $management->email;
        $phone = $management->phone;

        $subject=$template->title;
        $subject=str_replace("{category}", strtoupper($management_type), $subject);
        $subject=str_replace("{datecreated}",$management_datecreated,$subject);
        $subject=str_replace("{dateexpired}",$management_dateexpired,$subject);
        $subject=str_replace("{project}",$service,$subject);
        $subject=str_replace("{customer}",$customer,$subject);
        $subject=str_replace("{contact}",$contact,$subject);
        $subject=str_replace("{price}",$price_vat,$subject);
        $subject=str_replace("{note}",$note,$subject);
        $subject=str_replace("{email}",$email,$subject);
        $subject=str_replace("{phone}",$phone,$subject);
        $subject=str_replace("{STATUS}",$slogan,$subject);

        $content=$template->content;
        $re=str_replace("{datecreated}",$management_datecreated,$content);
        $re=str_replace("{dateexpired}",$management_dateexpired,$re);
        $re=str_replace("{category}",strtoupper($management_type),$re);
        $re=str_replace("{project}",$service,$re);
        $re=str_replace("{customer}",$customer,$re);
        $re=str_replace("{contact}",$contact,$re);
        $re=str_replace("{price}",$price_vat,$re);
        $re=str_replace("{note}",$note,$re);
        $re=str_replace("{email}",$email,$re);
        $re=str_replace("{phone}",$phone,$re);
        $re=str_replace("{STATUS}",$slogan,$re);

        $emails=explode(',', $email);
        $email_send=$emails[0];
        unset($emails[0]);
        $emails_cc=$emails;
        
        return [
            'email' => $email_send,
            'cc' => $emails_cc,
            'content' => $re,
            'subject' => $subject
        ];     
    }

    public static function send_mail($mail_info, $config_email_cc = []) 
    {
        \Mail::send(['html' => 'mail'], $mail_info, function ($message) use ($mail_info, $config_email_cc)
        {
            $message->subject($mail_info['subject']);
            $message->from('no-reply@tqdesign.vn', 'TQ Tecom');
            $message->to($mail_info['email']);
            if($mail_info['cc']) {
                $message->cc( array_merge($mail_info['cc'], $config_email_cc) );
            }
        });
    }
}