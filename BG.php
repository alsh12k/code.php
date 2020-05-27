<?php

define('BOT_TOKEN', '1098672710:AAHMeseIbbe5_ZopuwMzzbcK32lB7-sM6UM');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');


echo file_get_contents("https://api.telegram.org/bot" .BOT_TOKEN. "/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']);

function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".BOT_TOKEN."/".$method."?".http_build_query($datas);
return json_decode(file_get_contents($url));
}

$update  = json_decode(file_get_contents('php://input'));
$message = $update->message; 
$text = $message->text; 
$chat_id = $message->chat->id; 
$name = $message->from->first_name; 
$id = $message->from->id; 
$user = $message->from->username; 
$rembo ="890009521"; #ايديك#
$cc = file_get_contents("a.txt");
$ch = file_get_contents("ch.txt");
$ch1 = file_get_contents("ch1.txt");
$m = explode("\n",file_get_contents("member.txt"));
$m1 = count($m)-1;

$j = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch&user_id=".$id);

$j1 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$ch1&user_id=".$id);

if($text =='/start'and $id !=$rembo){
bot('sendmessage',[
'chat_id'=>$rembo,
'text'=>"دخل شخص للبوت 💢

‎اسمه $name
‎معرفه @$user
‎ايديه $id
",
]);
}

if($message && (strpos($j,'"status":"left"') or strpos($j,'"Bad Request: USER_ID_INVALID"') or strpos($j,'"status":"kicked"'))!== false){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"عذرا عزيزي اشترك بقناة البوت اولا✋
$ch
‎ثم ارسل /start",
]);
return false;
}

if ($message && !in_array($id, $m)){
    file_put_contents("member.txt", $id."\n",FILE_APPEND);
  }



if($message && (strpos($j1,'"status":"left"') or strpos($j1,'"Bad Request: USER_ID_INVALID"') or strpos($j1,'"status":"kicked"'))!== false){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"مرحبا بك عزيزي ،🎁.
‎لستخدام البوت عليك الاشتراك في قناة البوت ،💛.الثانيه 
‎قناة البوت : @$ch1،📯.
‎ان قمت بالاشتراك في قناة البوت ارسل /start مجددا ،🔌.",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'اشترك الان ','url'=>'t.me/' . $ch1]],
]
])
]);
return false;
}




if($text =='/rembo' and $id ==$rembo){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"اهلا بك عزيزي المطور 🚊", 
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"1 وضع اشتراك اجباري❌"],['text'=>"2 وضع اشتراك اجباري❌"]],
[['text'=>"اذاعه رسالة📢"],['text'=>"توجيه رسالة🔃"]], 
[['text'=>"عدد المشتركين👥"]],
], 
'resize_keyboard'=>true
]) 
]); 
} 

if($text =='‎1 وضع اشتراك اجباري❌'and $id ==$rembo){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"حسنا عزيزي ارسل معرف قناتك الاوله مثل 💎
@h4ck3riraq", 
]); 
file_put_contents("a.txt","ch");
} 

if($text and $cc =="ch"and $id ==$rembo){
file_put_contents("ch.txt"," $text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم حفظ معرف القناة ارفعني ادمن في القناة📛 ",
]);
file_put_contents("a.txt","0");
}

if($text =='‎2 وضع اشتراك اجباري❌'and $id ==$rembo){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"حسنا عزيزي ارسل معرف قناتك الثانيه مثل 💎
@h4ck3riraq", 
]); 
file_put_contents("a.txt","ch1");
} 

if($text and $cc =="ch1"and $id ==$rembo){
file_put_contents("ch1.txt"," $text");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"تم حفظ معرف القناة ارفعني ادمن في القناة📛 ",
]);
file_put_contents("a.txt","0");
}

if($text =='اذاعه رسالة📢'and $id ==$rembo){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"حسنا عزيزي ارسل رسالتك وسوف ارسلها للاعضاء💢", 
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"الغاء❌"]], 
], 
'resize_keyboard'=>true
]) 
]); 
file_put_contents("a.txt","send");
} 

if($text =='الغاء❌'and $id ==$rembo){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"تم الغاء الامر📛", 
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"وضع اشتراك اجباري❌"]],
[['text'=>"اذاعه رسالة📢"],['text'=>"توجيه رسالة🔃"]], 
[['text'=>"عدد المشتركين👥"]],
], 
'resize_keyboard'=>true
]) 
]);
file_put_contents("a.txt","0");
}


if($text =='توجيه رسالة🔃'and $id ==$rembo){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"حسنا عزيزي قم بتوجيه الرسالة♻️", 
]);
file_put_contents("a.txt","forward");
}
if($text and $text !="الغاء❌" and $cc =="send" and $id ==$rembo){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"تم نشر الرسالة بنجاح✅", 
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>"وضع اشتراك اجباري❌"]],
[['text'=>"اذاعه رسالة📢"],['text'=>"توجيه رسالة🔃"]], 
[['text'=>"عدد المشتركين👥"]],
], 
'resize_keyboard'=>true
]) 
]); 
for($i=0;$i<count($m); $i++){
bot('sendMessage', [
'chat_id'=>$m[$i],
'text'=>$text,
]);
file_put_contents("a.txt","0");
} 
}


if($text  and $cc == "forward" and $id == $rembo){
bot("sendmessage",[
'chat_id'=>$chat_id,
'text'=>"تم توجيه الرسالة💢",
]);
for($i=0;$i<count($m); $i++){
bot('forwardMessage', [
'chat_id'=>$m[$i],
'from_chat_id'=>$id,
'message_id'=>$message->message_id
]);
file_put_contents("a.txt","0");
} 
} 

if($text =='عدد المشتركين👥'and $id ==$rembo){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" اهلا عزيزي عدد اعضاء البوت ($m1)", 
]); 
}

function apiRequestWebhook($method, $parameters) {
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }

  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }

  $parameters["method"] = $method;

  header("Content-Type: application/json");
  echo json_encode($parameters);
  return true;
}

function exec_curl_request($handle) {
  $response = curl_exec($handle);

  if ($response === false) {
    $errno = curl_errno($handle);
    $error = curl_error($handle);
    error_log("Curl returned error $errno: $error\n");
    curl_close($handle);
    return false;
  }

  $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
  curl_close($handle);

  if ($http_code >= 500) {
    // do not wat to DDOS server if something goes wrong
    sleep(10);
    return false;
  } else if ($http_code != 200) {
    $response = json_decode($response, true);
    error_log("Request has failed with error {$response['error_code']}: {$response['description']}\n");
    if ($http_code == 401) {
      throw new Exception('Invalid access token provided');
    }
    return false;
  } else {
    $response = json_decode($response, true);
    if (isset($response['description'])) {
      error_log("Request was successfull: {$response['description']}\n");
    }
    $response = $response['result'];
  }

  return $response;
}

function apiRequest($method, $parameters) {
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }

  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }

  foreach ($parameters as $key => &$val) {
    // encoding to JSON array parameters, for example reply_markup
    if (!is_numeric($val) && !is_string($val)) {
      $val = json_encode($val);
    }
  }
  $url = API_URL.$method.'?'.http_build_query($parameters);

  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);

  return exec_curl_request($handle);
}

function apiRequestJson($method, $parameters) {
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }

  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }

  $parameters["method"] = $method;

  $handle = curl_init(API_URL);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($parameters));
  curl_setopt($handle, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

  return exec_curl_request($handle);
}
function Win($table){
	$mos=true;
	for($i=0;$i<3;$i++){
		for($j=0;$j<3;$j++){
			if($table[0][0]["text"]==" ") {$mos==false;break;}
		}
	}
	if($table[0][0]["text"]==$table[0][1]["text"]&&$table[0][1]["text"]==$table[0][2]["text"]&&$table[0][0]["text"]!=" ") $win=$table[0][0]["text"];
	else if($table[1][0]["text"]==$table[1][1]["text"]&&$table[1][1]["text"]==$table[1][2]["text"]&&$table[1][0]["text"]!=" ") $win=$table[1][0]["text"];
	else if($table[2][0]["text"]==$table[2][1]["text"]&&$table[2][1]["text"]==$table[2][2]["text"]&&$table[2][0]["text"]!=" ") $win=$table[2][0]["text"];
	
	else if($table[0][0]["text"]==$table[1][0]["text"]&&$table[0][0]["text"]==$table[2][0]["text"]&&$table[0][0]["text"]!=" ") $win=$table[0][0]["text"];
	else if($table[0][1]["text"]==$table[1][1]["text"]&&$table[0][1]["text"]==$table[2][1]["text"]&&$table[0][1]["text"]!=" ") $win=$table[0][1]["text"];
	else if($table[0][2]["text"]==$table[1][2]["text"]&&$table[0][2]["text"]==$table[2][2]["text"]&&$table[0][2]["text"]!=" ") $win=$table[0][2]["text"];
	
	else if($table[0][0]["text"]==$table[1][1]["text"]&&$table[0][0]["text"]==$table[2][2]["text"]&&$table[0][0]["text"]!=" ") $win=$table[0][0]["text"];
	else if($table[0][2]["text"]==$table[1][1]["text"]&&$table[0][2]["text"]==$table[2][0]["text"]&&$table[0][2]["text"]!=" ") $win=$table[0][2]["text"];
	
	if (isset($win)) return $win;
	else return false;
}

function getChat($chat_id){
	$json=file_get_contents('https://api.telegram.org/bot'.BOT_TOKEN."/getChat?chat_id=".$chat_id);
	$data=json_decode($json,true);
	return $data["result"]["first_name"];
}

function processMessage($message) {
  // process incoming message
  $message_id = $message['message_id'];
  $chat_id = $message['chat']['id'];
  if (isset($message['text'])) {
    // incoming text message
    $text = $message['text'];

    if (strpos($text, "/start") === 0) {
      apiRequestJson("sendMessage", array('chat_id' => $chat_id, "text" => "XO Game
Best simple game ever you play
just press start xo game to play with your friend", 'reply_markup' => array(
            "inline_keyboard"=>array(
			    array(array("text"=>"Programmer 1","url"=>"https://telegram.me/team_am"),
				array("text"=>"Programmer 2","url"=>"https://telegram.me/i_love_you_am")),
			    array(array("text"=>"Start XO Game","switch_inline_query"=>md5(date("YMDms"))))
			)
		)));
    } 
  }
}

function inlineMessage($inline){
	$id=$inline['id'];
	$chat_id=$inline['from']['id'];
	$query=$inline['query'];
	
	apiRequest("answerInlineQuery",array("inline_query_id"=>$id,"results"=>array(array("type"=>"article","id"=>$query,"title"=>"XO Game","input_message_content"=>array("message_text"=>"<b>XO Game</b>\press blow button to start game👇🏻👇🏻👇🏻","parse_mode"=>"HTML","disable_web_page_preview"=>false),
	    "reply_markup"=>array(
	        "inline_keyboard"=>array(
			    array(array("text"=>"Start Game!","callback_data"=>"play_".$chat_id))
			)
		)
	))));
	exit;
}

function callbackMessage($callback){
	  $user_id= $_GET['user'];
	  $callback_id=$callback['id'];
	  $chat_id=$callback['message']['chat']['id'];
	  $pv_id=$callback['from']['id'];
	  $data=$callback['data'];
	  $message_id=$callback['inline_message_id'];
      $text=$callback['message']['text'];
	  if(strpos($data, "play") === 0){
		  $data=explode("_",$data);
		  if($data[1]==$pv_id){
			  apiRequest("answerCallbackQuery",array('callback_query_id'=>$callback_id,'text'=>"You start this game then wait your friend start the game!",'show_alert'=>false));
		      exit;
		  }
		  else{
			  $Player1=$data[1]; $P1Name=getChat($Player1);
			  $Player2=$pv_id; $P2Name=getChat($Player2);
			  //
			  for($i=0;$i<3;$i++){
				  for($j=0;$j<3;$j++){
					  $Tab[$i][$j]["text"]=" ";
					  $Tab[$i][$j]["callback_data"]=$i.".".$j."_0.0.0.0.0.0.0.0.0_".$Player1.".".$Player2."_1_0";
				  }
			  }
			  $Tab[3][0]["text"]="Leave the game!";
			  $Tab[3][0]["callback_data"]="Left";
			  
			  apiRequest("editMessageText",array("inline_message_id"=>$message_id,"text"=>"Game started\n\n First Player:$P1Name(❌)\nSecond Player:$P2Name(⭕️)\n\n Is $P1Name(❌) Turn.","reply_markup"=>array(
			    "inline_keyboard"=>$Tab 
			  )));
			  exit;
		  }
	  }
	  else if($data=="Left"){
		  apiRequest("editMessageText",array("inline_message_id"=>$message_id,"text"=>"Player leave the game."," reply_markup"=>array(
			"inline_keyboard"=>$Tab 
		  )));  
		  exit;
	  }
	  else if($data=="end"){
		  $Tab=json_decode($row['Tab'],true);
		  $message_id=$message_id;
	
		  
		  apiRequest("editMessageText",array("inline_message_id"=>$message_id,"text"=>"Game is finished.","reply_markup"=>array(
			"inline_keyboard"=>$Tab 
		  )));  
		  exit;
	  }
	  else{
		  $data=explode("_",$data);
		  $a=explode(".",$data[0]);
		  $i=$a[0]; $j=$a[1];
		  $table=explode(".",$data[1]);
		  $Players=explode(".",$data[2]);
		  
		  //Turn
		  if((int)$data[3]==1) $Turn=$Players[0];
		  else if((int)$data[3]==2) $Turn=$Players[1];
		 
		  //Turn
	  
		  if($pv_id==$Turn){
			  $Player1=$Players[0]; $P1Name=getChat($Player1);
			  $Player2=$Players[1];  $P2Name=getChat($Player2);
			  
			  $Num=(int)$data[4]+1;
			  //NextTurn
			  if($pv_id==$Player1) {
				$NextTurn=$Player2;
				$NextTurnNum=2;
				$Emoji="❌";
				$NextEmoji="⭕️";
			  }
			  else {
				$NextTurn=$Player1;
				$NextTurnNum=1;
				$Emoji="⭕️";
				$NextEmoji="❌";
			  }
			  //TabComplete
			  $n=0;
			  for($ii=0;$ii<3;$ii++){
				  for($jj=0;$jj<3;$jj++){
					if((int)$table[$n]==1) $Tab[$ii][$jj]["text"]="❌";  
					else if((int)$table[$n]==2) $Tab[$ii][$jj]["text"]="⭕️";  
					else if((int)$table[$n]==0) $Tab[$ii][$jj]["text"]=" ";  
					$n++;  
				  }
			  }
			  
			  //Tab End
			  //NextTurn
			  
			  if($Tab[$i][$j]["text"]!=" ") apiRequest("answerCallbackQuery",array('callback_query_id'=>$callback_id,'text'=>"You can't choose.",'show_alert'=>false));
			  else{
				  $Tab[$i][$j]["text"]=$Emoji;
                  //
				  $n=0;
                  for($i=0;$i<3;$i++){
					  for($j=0;$j<3;$j++){
						  if($Tab[$i][$j]["text"]=="❌") $table[$n]=1;  
						  else if($Tab[$i][$j]["text"]=="⭕️") $table[$n]=2;  
						  else if($Tab[$i][$j]["text"]==" ") $table[$n]=0;
						  $n++;
					  }
				  }
                  //				  
				    if(Win($Tab)=="⭕️"||Win($Tab)=="❌") {
						
						if(Win($Tab)=="⭕️") $winner=getChat($Player2);
						else if(Win($Tab)=="❌") $winner=getChat($Player1);
                        
						$n=0;
                        for($ii=0;$ii<3;$ii++){
							for($jj=0;$jj<3;$jj++){
								$Tab[$ii][$jj]["callback_data"]="end";
								$n++;
							}
						}
						
					    apiRequest("editMessageText",array("inline_message_id"=>$message_id,"text"=>"First Player:$P1Name(❌)\nSecond Player:$P2Name(⭕️)\n\nWinner:".$winner."(".Win($Tab).")","reply_markup"=>array(
			                "inline_keyboard"=>$Tab 
			            )));  
					    exit;
				    }
					else if($Num>=9) {
						
						$n=0;
                        for($ii=0;$ii<3;$ii++){
							for($jj=0;$jj<3;$jj++){
								$Tab[$ii][$jj]["callback_data"]="end";
								$n++;
							}
						}
						
					    apiRequest("editMessageText",array("inline_message_id"=>$message_id,"text"=>"First Player:$P1Name(❌)\nSecond Player:$P2Name(⭕️)\n\nNo one has win this game!","reply_markup"=>array(
			                "inline_keyboard"=>$Tab 
			            )));  
					    exit;
				    }
				    else{				
						
				        //Tab
						$n=0;
                        for($ii=0;$ii<3;$ii++){
							for($jj=0;$jj<3;$jj++){
								$Tab[$ii][$jj]["callback_data"]=$ii.".".$jj."_".implode(".",$table)."_".$Player1.".".$Player2."_".$NextTurnNum."_".$Num;
								$n++;
							}
						}
						
						$Tab[3][0]["text"]="Leave th e game!";
			            $Tab[3][0]["callback_data"]="Left";			
						//Tab
						
						$NextTurn=getChat($NextTurn);
				        apiRequest("editMessageText",array("inline_message_id"=>$message_id,"text"=>"First Player:$P1Name(❌)\nSecond Player:$P2Name(⭕️)\n\n Is $NextTurn($NextEmoji) Turn.","reply_markup"=>array(
			                "inline_keyboard"=>$Tab 
			            )));
					    exit;
				    }
			}
		}
		else{
		    apiRequest("answerCallbackQuery",array('callback_query_id'=>$callback_id,'text'=>"Not your turn.",'show_alert'=>false));
			exit;
		}
	}
	  //apiRequest("sendMessage",array("chat_id"=>111825543,"text"=>$data));
}


define('WEBHOOK_URL', 'https://example.com/mybot/XO_Game.php');

if (php_sapi_name() == 'cli') {
  // if run from console, set or delete webhook
  apiRequest('setWebhook', array('url' => isset($argv[1]) && $argv[1] == 'delete' ? '' : WEBHOOK_URL));
  exit;
}


$content = file_get_contents("php://input");
$update = json_decode($content, true);

if (!$update) {
  // receive wrong update, must not happen
  exit;
}

if (isset($update["message"])) {
  processMessage($update["message"]);
}
else if(isset($update["inline_query"])){
	inlineMessage($update["inline_query"]);
}
else if(isset($update["callback_query"])){
	callbackMessage($update["callback_query"]);
}


if($text){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"on bot "
]);
}
