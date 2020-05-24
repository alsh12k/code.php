<?php 


$TOKEN ="1171313866:AAHlTsQgRx-6dbbqTdGC6AAb7UHaPZ4o3NM";


define("TOKEN",$TOKEN); 

function bot($method,$datas=[]){
    $iBadlz = http_build_query($datas);
        $url = "https://api.telegram.org/bot".TOKEN."/".$method."?$iBadlz";
        $iBadlz = file_get_contents($url);
        return json_decode($iBadlz);
}


echo file_get_contents("https://api.telegram.org/bot$TOKEN/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);
  
  $RS = "B_B6B"; // معرف قناتك بدون @
$join = file_get_contents("https://api.telegram.org/bot".TOKEN."/getChatMember?chat_id=@$RS&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"📛عذرا عزيزي يجب عليك الاشتراك بقناة البوت اولا📛 
‎❤️لكي تستطيع استخدام البوت 

‎القناة:-   @$RS

‎بعد الاشتراك ارسل   /start", 
]);return false;}
  

$update   = json_decode(file_get_contents('php://input'));
$message  = $update->message;
$from_id  = $message->from->id;
$chat_id  = $message->chat->id;
$text     = $message->text;
$data     = $update->callback_query->data;
$inline   = $update->inline_query->query;
$id       = $update->inline_query->from->id;
$msg_id   = $update->inline_query->inline_message_id;
$username = $update->inline_query->from->username;
$cuser    = $update->callback_query->from->username;
$cid      = $update->callback_query->from->id; 
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

if ($inline) {
    $ex = explode(" ", $inline);
    $user = trim($ex[0],"@");
    $wh = str_replace($ex[0], $wh, $inline);
    bot('answerInlineQuery',[
            'inline_query_id'=>$update->inline_query->id,    
            'results' => json_encode([[
                'type'=>'article',
                'id'=>base64_encode(rand(5,555)),
                'title'=>"هـذه الـهـمـسـة خـاصـة لـ $user ",
             'input_message_content'=>['parse_mode'=>'HTML','message_text'=>"هـذه الـهـمـسـة خـاصـة لـ $user "],
            'reply_markup'=>['inline_keyboard'=>[
                [
                ['text'=>' عـرض الـهـمـسـة','callback_data'=>$user."or".$username."or".$wh]
                ],
             ]]
          ]])
        ]);
}
if ($data) {
    $ex = explode("or", $data);
    if ($cuser == $ex[0] or $cuser == $ex[1] or $cid == $ex[0]) {
        bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>$ex[2],
            'show_alert'=>true
            ]);
    }
   if ($cuser != $ex[0] or $cuser != $ex[1] or $cid != $ex[0]) {
        bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>"الـهـمـسـة لـيـسـة لـك عـزيـزي ",
            'show_alert'=>true
            ]);
    }
}


if ($text == "/start" or $text == "/start") {
 bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"
‎مـرحـبـا، بـك فـي بـوت اهـمـسـلـي 

‎تـسـتطيع ارسـال رسـالة بـشـكل سـري

‎لـايـمـكـن لـلـغـيـر الـاطـلـاع عـلـيـهـا 

- /help
",
  'reply_markup'=>json_encode([
   'inline_keyboard'=>[
   [['text' => " اكـتـب هـمـسـة لـصـديـق", 'switch_inline_query' => "اكـتب مـعـرف الـصـديـق ثـم الـرسـالـة "]]
   ]
  ])
]);
}
if ($text == "/help" or $text == "/help") {
 bot('sendMessage',[
  'chat_id'=>$chat_id,
  'text'=>"
‎فكرة البوت يمكنك في المجموعات
‎مـن ارسـال رسـالة لـاشخاص داخل
‎الـمجموعة بشكل سـري لـايمك لغير
‎انـــــــــ يـطـلـع عــلـى الـرسـالـة 

‎كـيـفـيـة اسـتـخـدام الـبـوت 
‎مـن داخـل الـمـجـمـوعـة اكـتـب

@ameer20bot @MA_400  الرسالة هنا
",
  'reply_markup'=>json_encode([
   'inline_keyboard'=>[
   [['text' => " اكـتـب هـمـسـة لـصـديـق", 'switch_inline_query' => "اكـتب مـعـرف الـصـديـق ثـم الـرسـالـة "]]
   ]
  ])
]);
}
