<?php


ob_start();
$token = '2041835826:AAEISxSS-HSfA4M9VO0cQiq-MDJPHJpVcRU';
define('API_KEY',$token);
function bot($method,$datas=[]){
  $url = "https://api.telegram.org/bot".API_KEY."/".$method;
  $datas = http_build_query($datas);
  $res = file_get_contents($url.'?'.$datas);
  return json_decode($res);
}
function save($array){
    file_put_contents('sales.json', json_encode($array));
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$user = $message->from->username;
$BG = file_get_contents("BG.txt");

$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$BG&user_id=".$id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"📛عذرا عزيزي يجب عليك الاشتراك بقناة البوت اولا📛 
🙂لكي تستطيع استخدام البوت 

القناة:-   @$BG

بعد الاشتراك ارسل   /start", 
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'اشترك الان' ,'url'=>"t.me/" . $BG]],
]])
]);return false;}


if(isset($update->callback_query)){
  $chat_id = $update->callback_query->message->chat->id;
  $message_id = $update->callback_query->message->message_id;
  $data     = $update->callback_query->data;
 $user = $update->callback_query->from->username;
}
$admin = 961743188;
$me = bot('getme',['bot'])->result->username;
$sales = json_decode(file_get_contents('sales.json'),1);


if($text == "/start" and $id != $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>'
- اهلا عزيزي 💞
- هذا البوت لمسابقة في قناة  امير علي

- المسابقة تتضمن الفائز الاول يحصل على حساب انستا 40K عراقي
- والثاني اداة اختراق اجهزه لاندرويد عاما
-وثالث حساب انستا عراقي 10K متفاعل عام 🔥

المسابقة لمن يجمع اكثر عدد من النقاط 🎁.
~ عدد نقاطك : '.$sales[$chat_id]['collect'],

'reply_to_message_id'=>$message->message_id,
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"جمع نقاط", 'callback_data'=>'col']],
[['text'=>"• قناة البوت •", 'url'=>'t.me/B_B6B']],
[['text'=>"• تابع جديدنا •", 'url'=>'t.me/B_B6B']],
]
])
]);
}
if(preg_match('/\/(start)(.*)/', $text)){
  $ex = explode(' ', $text);
  if(isset($ex[1])){
   if(!in_array($chat_id, $sales[$chat_id]['id'])){
    $sales[$ex[1]]['collect'] += 1;
    save($sales);
    bot('sendMessage',[
     'chat_id'=>$ex[1] ,
     'text'=>"- قام : @$user بالدخول الى الرابط الخاص وحصلت على نقطة واحده ، ✨\n~ عدد نقاطك : ".$sales[$ex[1]]['collect'], 
    ]);
    $sales[$chat_id]['id'][] = $chat_id;
    save($sales);
   }
  }
  $status = bot('getChatMember',['chat_id'=>$BG,'user_id'=>$chat_id])->result->status;
  if($status == 'left'){
   bot('sendMessage',[
       'chat_id'=>$chat_id,
       'text'=>"- لا تستطيع بدء استخدام البوت الا بعد الاشتراك بقناة البوت 🚫' @gcgcz",
       'reply_to_message_id'=>$message->message_id,
   ]);
   exit();
  }
  if($sales[$chat_id]['collect'] == null){
   $sales[$chat_id]['collect'] = 0;
   save($sales);
  }
  bot('editmessagetext',[
   'chat_id'=>$chat_id,
   'text'=>"
- اهلا عزيزي 💞
- هذا البوت لمسابقة في قناة  امير علي

- المسابقة تتضمن الفائز الاول يحصل على حساب انستا 40K عراقي
- والثاني اداة اختراق اجهزه لاندرويد عاما
-وثالث حساب انستا عراقي 10K متفاعل عام 🔥

المسابقة لمن يجمع اكثر عدد من النقاط 🎁.

~ عدد نقاطك : .$sales[$chat_id]['collect'] 
",

   'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [['text'=>'• تجميع النقاط ، 💸','callback_data'=>'col']],
     [['text'=>'شراء نقاط','url'=>'t.me/MA_400']],
     [['text'=>'~ تابعنا 🧨.','url'=>'https://t.me/B_B6B']]
    ] 
   ])
  ]);
 }

 if($data == 'col'){
  bot('editMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>'- قم بأرسال الرابط ادناه لأصدقائك وكل شخص يدخل تحصل على نقطة واحده  ، ⬇️

https://t.me/'.$me.'?start='.$chat_id.'
💰- اذا كانت طريقه التجميع مستحيله لديك يمكنك مراسله المطور وشراء النقاط ✨
🥀 - @MA_400',
  ]);
 }

 if($text == "/sendcoin" and $admin){
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
أرسل أيدي الشخص الذي تريد إرسال النقاط له
",
]);
  $sales['mode'] = 'chat';
  save($sales);
  exit;
  }
   if($text != '/start' and $text != null and $sales['mode'] == 'chat'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل الكمية التي تريد إرسالها",
 ]);
   $sales['mode'] = 'poi';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم إضافة $text نقطة إلى حساب ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تمت إضافة $text نقطة إلى حسابك في البوت من قبل المطور ",
  ]);
  $sales['mode'] = null;
  $sales[$sales['idd']]['collect'] += $text;
  $sales['idd'] = null;
  save($sales);
  exit;
}
if($text == "/takecoin" and $admin ){
  bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>"
أرسل أيدي الشخص الذي تريد خصم النقاط منه
",
]);
  $sales['mode'] = 'chat1';
  save($sales);
  exit;
  }
   if($text != '/start' and $text != null and $sales['mode'] == 'chat1'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=> "أرسل الكمية التي تريد خصمها",
 ]);
   $sales['mode'] = 'poi1';
   $sales['idd'] = $text;
  save($sales);
  exit;
}
 if($text != '/start' and $text != null and $sales['mode'] == 'poi1'){
  bot('sendMessage',[
   'chat_id'=>$chat_id,
 'text'=>"تم خصم $text نقطة من حساب ".$sales['idd']." بنجاح ",
]);
  bot('sendmessage',[
   'chat_id'=>$sales['idd'],
  'text'=>"تمت خصم $text نقطة من حسابك في البوت من قبل المطور ",
  ]);
  $sales['mode'] = null;
  $sales[$sales['idd']]['collect'] -= $text;
  $sales['idd'] = null;
  save($sales);
  exit;
}

$ali = file_get_contents("alsh.txt");
$idi = json_decode(file_get_contents("members.json"),true);
if($text and !in_array($id, $idi["ids"])){
$idi['ids'][] = "$id";
file_put_contents("members.json", json_encode($idi));}
$mem = $idi['ids'];
$count = count($mem);


if ($text == "/start" and $id == $admin) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
مرحبا بك مطوري اليك القائمه    
لرسال نقاط الى العضو ارسل /sendcoin
لخصم نقاط من العضو ارسل /takecoin
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'<•> المشتركين <•>','callback_data'=>'m1']],[['text'=>'<•> اذاعه للكل <•>','callback_data'=>'send']],

[['text'=>'<•> اضف قناة <•>','callback_data'=>'aqn'],['text'=>'<•> حذف القناة <•>','callback_data'=>'dqn']],

]
])
]);
}

if ($data == "back" ) {
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"
مرحبا بك مطوري اليك القائمه    
لرسال نقاط الى العضو ارسل /sendcoin
لخصم نقاط من العضو ارسل /takecoin
",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'<•> المشتركين <•>','callback_data'=>'m1']],[['text'=>'<•> اذاعه للكل <•>','callback_data'=>'send']],

[['text'=>'<•> اضف قناة <•>','callback_data'=>'aqn'],['text'=>'<•> حذف القناة <•>','callback_data'=>'dqn']],
]
])
]);
}

if($data == "m1"){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
‎ • عدد المشتركين هو » $count « •
        ",
        'show_alert'=>true,
]);
}

if($data =="send"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل رسالتك 📮", 
]);
file_put_contents("alsh.txt","send");
} 
if($text and $ali == "send" and $id == $admin){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'-تم ارسال رسالتك الى  الجميع ✔️',
'reply_to_message_id'=>$message->message_id,
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'العوده🔙' ,'callback_data'=>"back"]],
]])
]);
for($i=0;$i<count($mem); $i++){
bot('sendMessage', [
'chat_id'=>$mem[$i],
'text'=> " You have message : " . $text,
]);
unlink("alsh.txt");
}
}


if($data =="aqn"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل معرف قناتك بدون @ ", 
]);
file_put_contents("alsh.txt","send1");
} 
if($text and $ali == "send1" and $id == $admin){
file_put_contents("BG.txt", $text);
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'
تم تم اضافه القناة ✔️
الان ارفع البوت ادمن في القناة
',
'reply_to_message_id'=>$message->message_id,
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'العوده🔙' ,'callback_data'=>"back"]],
]])
]);
unlink("alsh.txt");
}


if($data == 'dqn' ){
file_put_contents("BG.txt", "");
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
"text"=>'تم تم حذف القناة ✔️',
'reply_to_message_id'=>$message->message_id,
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'العوده🔙' ,'callback_data'=>"back"]],
]])
]);
}

