<?php

header('Content-type: application/json');

$TOKEN ="1194242680:AAFlaNGP6Jxh21SGN04qsPzNOQD25cFbt5o";


require "function.php";


//echo file_get_contents("https://api.telegram.org/bot$TOKEN/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);

$id = $message->from->id;
$api = json_decode(file_get_contents("https://alsh13.000webhostapp.com/api.php?a=newmail"), true);
$mail = $api['result']['mail'];
$id_mail = $api['result']['id'];
mkdir("data");
$data1 = $update->callback_query->message->chat->id;
$data2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$now = json_decode(file_get_contents("data/now.json"), true);
$no = $now['ids']['id_mail'];
$ar = ["ok"=>"true","ids"=>[$data1=>["mail"=>$mail,"id_mail"=>$id_mail]]];

$apimessage = json_decode(file_get_contents("https://alsh13.000webhostapp.com/api.php?a=mails&id=" . $no), true);
foreach($apimessage as $key => $val){
    $result  = $val;
    $id = $val["_id"]['$oid'];
    $from = $val["mail_from"];
    $to = $val["to"];
    $subject = $val["mail_subject"];
    $body = $val["mail_text"];
}

if($text == "/start"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
مرحبا بك في بوت الايميلات الوهميه 

تم صنع البوت بواسطه : @alsh_bg
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'انشاء ايميل','callback_data'=>'new']],
[['text'=>'الرسائل','callback_data'=>'msgs'],['text'=>'حذف ايميل','callback_data'=>'new']],

[['text'=>'ايميلاتي','callback_data'=>'msgs'],['text'=>'عرض الايميل','callback_data'=>'new']],
]
])
]);
}

if($data == "back"){
bot('editmessagetext',[
'chat_id'=>$data1,
'message_id'=>$data2,
'text'=>"
مرحبا بك في بوت الايميلات الوهميه 

تم صنع البوت بواسطه : @alsh_bg
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'انشاء ايميل','callback_data'=>'new']],
[['text'=>'الرسائل','callback_data'=>'msgs'],['text'=>'حذف ايميل','callback_data'=>'new']],
[['text'=>'ايميلاتي','callback_data'=>'msgs'],['text'=>'عرض الايميل','callback_data'=>'new']],
]
])
]);
}


if($data == "new"){
file_put_contents("data/now.json", json_encode($ar));
bot('editmessagetext',[
'chat_id'=>$data1,
'message_id'=>$data2,
'text'=>" 
- - - - - - - - - - - - - - -
your mail : 
" . $api['result']['mail'] . " - - - - - - - - - - - - - - -",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع','callback_data'=>'back']],
]
])
]);
}




if($data == "msgs" and !in_array($apimessage["error"], $apimessage)  and !in_array($apimessage["result"], $apimessage) ){
bot('editmessagetext',[
'chat_id'=>$data1,
'message_id'=>$data2,
'text'=>"🆔 iD : $id 
   - - - - - - - - - - - - - - -
   🔖 From : $from 
   - - - - - - - - - - - - - - -
   🖇 To : $mail 
   - - - - - - - - - - - - - - -
   📨 Subject : $subject
   - - - - - - - - - - - - - - -
   ✉️ Message : $body
   - - - - - - - - - - - - - - -
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع','callback_data'=>'back']],
]
])
]);
}else 

if($data == "msgs" and !in_array($apimessage["result"], $apimessage) ){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
‎ • » لا يوجد رسائل حاليا « •
        ",
        'show_alert'=>true,
]);
}else 

if($data == "msgs"){
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
‎ • » حدث خطأ في اثناء استعاده البيانات« •
        ",
        'show_alert'=>true,
]);
}




print_r($now);
