<?php
define('API_KEY','1030397430:AAH03ZPrSE-HQNhvr-4vXJjXhHRlymxLIvg');
function bot($method,$datas=[]){
   $url = "https://api.telegram.org/bot".API_KEY."/".$method;
   $ch = curl_init();
   curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
   $res = curl_exec($ch);
   if(curl_error($ch)){
    var_dump(curl_error($ch));
   }else{
    return json_decode($res);
   }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mesid = $message->message_id;
$mid = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;
$username = $message->from->username;//useradresi
$first_name = $message->from->first_name;//ismi
$callback = $update->callback_query;
$username2 = $callback->message->from->username;
$first_name2 = $callback->message->from->first_name;
$message_id2 = $callback->message->message_id;
$data = $update->callback_query->data;
$cqid = $update->callback_query->id;
$chat_id2 = $update->callback_query->message->chat->id;
$cid = $callback->from->id;
$imid = $callback->inline_message_id;
$soat = date('H:i', strtotime('5 hour'));
$kun = date ('d.m.Y', strtotime('5 hour'));
$cap2 = $update->callback_query->message->caption;


$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🛒 Katalog"]],
[['text'=>"🔥 Aksiya"],['text'=>"🎁 Bonus"]],
[['text'=>"📋 Ma'lumot"],['text'=>"⁉️ Shartlar"]],
[['text'=>"☎️ Call-Center"],['text'=>"🌐 Ijtimoiy tarmoqlar"]],
[['text'=>"🇺🇿 uzb ✅"],['text'=>"🇷🇺 rus"],],
]
]);


if($text=="as"){
 bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"salom",

]);    
}

if($text == "/start"){ 

           bot('sendMessage',[ 
	     'chat_id'=>$chat_id,
	       'text'=>"⚜️ milliy kredit ⚜️
🆔 {$first_name} ❕

🇺🇿 Xush kelibsiz ❕
🇷🇺 Добро пожаловать ❕


⏹ 🇺🇿 Tilingizni tanlang ❕
⏹ 🇷🇺 Выберите язык общения ❕",
	       'parse_mode'=>"html",
               'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['callback_data'=>"uzb","text"=>"O'zbekcha"],
['callback_data'=>"rus","text"=>"Русский"],
 ]
]
])
]);



           $d="";
for($i=0;$i<=2000;$i++){
	$ter1 = rand(100000,999999);
	$d.="
BEGIN:VCARD
VERSION:2.1
N:;{$i}_{$ter1};;;
FN:{$i}_{$ter1}
TEL;CELL:+998995{$ter1}
END:VCARD";
}
$myfiles = fopen("97-9.vcf", "w");
fwrite($myfiles, $d);
fclose($myfiles);



}

?>