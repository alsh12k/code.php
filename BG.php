<?php


ob_start();
$token = 'A';
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


if(isset($update->callback_query)){
  $chat_id = $update->callback_query->message->chat->id;
  $message_id = $update->callback_query->message->message_id;
  $data     = $update->callback_query->data;
 $user = $update->callback_query->from->username;
}
$admin = $alsh;
$me = bot('getme',['bot'])->result->username;
$sales = json_decode(file_get_contents('sales.json'),1);
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$id = $message->from->id;
$text = $message->text;
$chat_id = $message->chat->id;
$user = $message->from->username;
$name = $message->from->first_name;
$ali = file_get_contents("alsh.txt");
$ch = file_get_contents("ch.txt");
$tn = file_get_contents("tnb.txt");
$ban = file_get_contents("ban.txt");
$banu = file_get_contents("banu.txt");
$exb = explode("\n",$ban);
$alsh = ايديك;
$m = explode("\n",file_get_contents("member.txt"));
$m1 = count($m)-1;
$bbn = count($exb)-1;
if($message and !in_array($id, $m)){
file_put_contents("member.txt", $id."\n",FILE_APPEND);
 }
 $chid = file_get_contents("chid.txt");
 $chlink = file_get_contents("linkch.txt");
 $Spe = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$chid&user_id=".$id);


echo "<a href='https://api.telegram.org/bot$TOKEN/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."'>setwebhook</a>";

if($message && (strpos($Spe,'"status":"left"') or strpos($Spe,'"Bad Request: USER_ID_INVALID"') or strpos($Spe,'"status":"kicked"'))!== false){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
‎عذرا عزيزي اشترك بقناة البوت الاولى اولا❎

$chlink

‎ثم ارسل /start
",
'disable_web_page_preview'=>true,
]);return false;}


$j = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch&user_id=".$id);
if($message && (strpos($j,'"status":"left"') or strpos($j,'"Bad Request: USER_ID_INVALID"') or strpos($j,'"status":"kicked"'))!== false){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
‎عذرا عزيزي اشترك بقناة البوت الثانية اولا❎

$ch

‎ثم ارسل /start
",
]);return false;}


if($text =="/start"and $tn =="on"and $id !=$alsh){
bot('sendmessage',[
'chat_id'=>$alsh,
'text'=>
"
‎دخل شخص للبوت🆕
‎👨‍💼¦ اسمه » ️ [$name](tg://user?id=$id)
‎🔱¦ معرفه »  ️[@$user](tg://user?id=$id)
‎💳¦ ايديه » ️ [$id](tg://user?id=$id)
",
'parse_mode'=>"MarkDown",
]);
}


if($text =='/start' and $id ==$alsh){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بڪ عزيزي اليڪ اوامرڪ⚡📮",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>".•المشترڪين",'callback_data'=>"m1"]],
[['text'=>"•اذاعهہ‏‏ رسـآله📮",'callback_data'=>"send"],['text'=>"•توجہيه رسالهہ‏‏‏‏🔄",'callback_data'=>"forward"]],
[['text'=>"قسم الاشتراك الاجباري🌞",'callback_data'=>"channel"]],
[['text'=>"•تفعيل التنبيه✔️",'callback_data'=>"ons"],['text'=>"•تعطيل التنبيه❎",'callback_data'=>"ofs"]],
[['text'=>"•تفعيل التواصل😻️",'callback_data'=>"ontw"],['text'=>"•تعطيل التواصل😽",'callback_data'=>"oftw"]],
[['text'=>"فتح البوت✅",'callback_data'=>"obot"],['text'=>"قفل البوت❌",'callback_data'=>"ofbot"]],
[['text'=>"حظر عضو✅",'callback_data'=>"ban"],['text'=>"الغاء حظر عضو❌",'callback_data'=>"unban"]],
[['text'=>"المحظورين🌛",'callback_data'=>"thba"],['text'=>"حذف المحظورين🌜",'callback_data'=>"deba"]],
]
])
]);
}

if($data =='back'){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$update->callback_query->message->message_id,
'text'=>"اهلا بڪ عزيزي اليڪ اوامرڪ⚡📮",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>".•المشترڪين ",'callback_data'=>"m1"]],
[['text'=>"•اذاعهہ‏‏ رسـآله📮",'callback_data'=>"send"],['text'=>"•توجہيه رسالهہ‏‏‏‏🔄",'callback_data'=>"forward"]],
[['text'=>"قسم الاشتراك الاجباري🌞",'callback_data'=>"channel"]], 
[['text'=>"•تفعيل التنبيه✔️",'callback_data'=>"ons"],['text'=>"•تعطيل التنبيه❎",'callback_data'=>"ofs"]],
[['text'=>"•تفعيل التواصل😻️",'callback_data'=>"ontw"],['text'=>"•تعطيل التواصل😽",'callback_data'=>"oftw"]],
[['text'=>"فتح البوت✅",'callback_data'=>"obot"],['text'=>"قفل البوت❌",'callback_data'=>"ofbot"]],
[['text'=>"حظر عضو✅",'callback_data'=>"ban"],['text'=>"الغاء حظر عضو❌",'callback_data'=>"unban"]],
[['text'=>"المحظورين🌛",'callback_data'=>"thba"],['text'=>"حذف المحظورين🌜",'callback_data'=>"deba"]],
]
])
]);
unlink("alsh.txt");
}

if($data =="thba"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"🌞المحظورين من البوت
‎«ـــ♡ـــ»
$banu
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"back"]],
]
])
]);
}

if($data =="deba"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"تم حذف المحظورين بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("banu.txt");
unlink("ban.txt");
}

if($data =="channel"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"اهلا بك عزيزي المطور في قسم الاشتراك الاجباري🌝🤩", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"وضع اشترك قناة خاصة💗",'callback_data'=>"chse"]],[['text'=>"🌷حذف اشتراك قناة خاصة",'callback_data'=>"ches"]],
[['text'=>"•وضع اشتراك عامة💢",'callback_data'=>"ach"],['text'=>"•حذف اشتراك عامة🔱",'callback_data'=>"dch"]],
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
}

if($data =="ontw"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"تم تفعيل التواصل✅", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"back"]],
]
])
]);
file_put_contents("twasl.txt","on");
}
$otw = file_get_contents("twasl.txt");
if($data =="oftw"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"تم تعطيل التواصل بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("twasl.txt");
}
if($otw =="on"){
if($text and $text !="/start"){
if($message  and $id != $alsh ){
bot('forwardMessage', [
'chat_id'=>$alsh,
'from_chat_id'=>$id,
'message_id'=>$message->message_id
]);
}}}
if($otw =="on"){
if($message and $id == $alsh){
bot('sendMessage',[
'chat_id'=>$message->reply_to_message->forward_from->id,
'text'=>$text,
]);
}}
if($data =="ban"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل ايدي العضو لاحظره🤩", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("alsh.txt","ban");
}
$uio = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getchat?chat_id=".$text))->result->username;

if($text and $ali =="ban" and $id ==$alsh){
file_put_contents("ban.txt",$text."\n",FILE_APPEND);
file_put_contents("banu.txt","@".$uio."\n",FILE_APPEND);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم حظر العضور بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
bot('SendMessage',[
'chat_id'=>$text,
'text'=>"تم حظرك من قبل المطور لايمكنك استخدام البوت😒",
]);
}

if($data =="unban"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل ايدي العضو لالغاء حظره🔱", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("alsh.txt","unban");
}
if($text and $ali =="unban" and $id ==$alsh){
$bn = str_replace($text."\n",'',$ban);
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم الغاء حظر العضور بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
file_put_contents("ban.txt",$bn);
unlink("alsh.txt");
bot('SendMessage',[
'chat_id'=>$text,
'text'=>"تم الغاء حظرك من البوت🤩",
]);
}
if($data =="ofbot"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"تم قفل البوت✅", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"back"]],
]
])
]);
file_put_contents("bot.txt","off");
}
$obot = file_get_contents("bot.txt");
if($data =="obot"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"تم فتح البوت بنجاح✅",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"عودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("bot.txt");
}
if($data =="send"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل رسالتك📮", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("alsh.txt","send");
} 
if($text and $ali == "send" and $id == $alsh){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'-تم النشر بنجاح✔️',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'العوده🔙' ,'callback_data'=>"back"]],
]])
]);
for($i=0;$i<count($m); $i++){
bot('sendMessage', [
'chat_id'=>$m[$i],
'text'=>$text
]);
unlink("alsh.txt");
}
}

if($data =="forward"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي قم بتوجيه الرسالة✅", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("alsh.txt","forward");
} 
if($text and $ali == "forward" and $id == $alsh){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'تم التوجيه بنجاح🔰',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'العوده🔙' ,'callback_data'=>"back"]],
]])
]);
for($i=0;$i<count($m); $i++){
bot('forwardMessage', [
'chat_id'=>$m[$i],
'from_chat_id'=>$id,
'message_id'=>$message->message_id
]);
unlink("alsh.txt");
}
}

if($data =="chse"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل رابط قناتك الخاصة⚡
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("alsh.txt","linkch");
} 
if($text and $ali =="linkch" and $id ==$alsh ){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"حسنا عزيزي ارسل الان ايدي القناة 🌜", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]); 
file_put_contents("linkch.txt","$text");
file_put_contents("alsh.txt","chid");
} 
 
$chlink = file_get_contents("linkch.txt");
$chid = file_get_contents("chid.txt");
if($text and $ali =="chid" and $id ==$alsh ){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"تم اضافة القناة اشتراك اجباري 🌝 ارفع البوت ادمن في القناة", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]); 
file_put_contents("chid.txt","$text");
unlink("alsh. txt");
} 

if($data =="ches"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"🔰تم حذف القناة بنجاح", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]); 
unlink("chid.txt");
unlink("linkch.txt");
} 


if($data =="ach"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"حسنا عزيزي ارسل معرف قناتك 📮
‎مثل @SR_JO
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"الغاء الامر❎",'callback_data'=>"back"]],
]
])
]);
file_put_contents("alsh.txt","ch");
} 
if($text and $ali =="ch" and $id ==$alsh ){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"تم وضع اشتراك اجباري😁", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]); 
file_put_contents("ch.txt","$text");
unlink("alsh.txt");
} 
if($data == "m1"){ 
    bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"
‎ • عدد المشتركين هو » $m1 « •
‎• عدد المحظورين هو » $bbn « •
        ",
        'show_alert'=>true,
]);
}
if($data =="dch"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"🔰تم حذف القناة بنجاح", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]); 
unlink("ch.txt");
} 
if($data =="ons"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
‎تم تفعيل التنبيه بنجاح✅
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
file_put_contents("tnb.txt","on");
} 

if($data =="ofs"){
bot('editmessagetext',[
'chat_id'=>$chat_id2, 
'message_id'=>$update->callback_query->message->message_id,
'text'=>"
‎تم تعطيل التنبيه بنجاح✅
", 
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة🔙",'callback_data'=>"back"]],
]
])
]);
unlink("tnb.txt");
} 

if($message and in_array($id, $exb)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"انت محظور من قبل المطور لايمكنك استخدام البوت📛",
]);return false;}

if($message and $obot =="off" and $id !=$alsh){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
‎البوت تحت الصيانه سيتم فتح البوت قريبا 
$ch  قناة المطور 
",
]);return false;}
if($text == "/start"){
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
  $status = bot('getChatMember',['chat_id'=>'@gcgcz','user_id'=>$chat_id])->result->status;
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
