<!-- <?php
/**
 * Copyright 2016 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
// [START all]
use google\appengine\api\mail\Message;
// Notice that $image_content_id is the optional Content-ID header value of the
// attachment. Must be enclosed by angle brackets (<>)
$image_content_id = '<image-content-id>';
// Pull in the raw file data of the image file to attach it to the message.
//$image_data = file_get_contents('image.jpg');
try {
    $message = new Message();
    $message->setSender('from@example.com');
    $message->addTo('to@example.com');
    $message->setSubject('Example email');
    $message->setTextBody('Hello, world!');
   // $message->addAttachment('image.jpg', $image_data, $image_content_id);
    $message->send();
    echo 'Mail Sent';
} catch (InvalidArgumentException $e) {
    echo 'There was an error';
}

  // require 'vendor/autoload.php';
  // use \Mailjet\Resources;
  // //$mj = new \Mailjet\Client('8e65fcb4b60f1beb0428238a0484d89f','422c7b6697accc87a17ac0b24754027f',true,['version' => 'v3.1']);
  // $mj = new \Mailjet\Client(getenv('8e65fcb4b60f1beb0428238a0484d89f'), getenv('422c7b6697accc87a17ac0b24754027f'),true,['version' => 'v3.1']);
  // $body = [
  //   'Messages' => [
  //     [
  //       'From' => [
  //         'Email' => "farmazonindia@outlook.com",
  //         'Name' => "Farmazon"
  //       ],
  //       'To' => [
  //         [
  //           'Email' => "farmazonindia@outlook.com",
  //           'Name' => "Farmazon"
  //         ]
  //       ],
  //       'Subject' => "Greetings from Mailjet.",
  //       'TextPart' => "My first Mailjet email",
  //       'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
  //       'CustomID' => "AppGettingStartedTest"
  //     ]
  //   ]
  // ];
  // $response = $mj->post(Resources::$Email, ['body' => $body]);
  // $response->success() && var_dump($response->getData());

//require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases
// $email = new \SendGrid\Mail\Mail(); 
// $email->setFrom("farmazonindia@outlook.com", "Example User");
// $email->setSubject("Sending with SendGrid is Fun");
// $email->addTo("janani19.19.19@gmail.com", "Example User");
// $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
// $email->addContent(
//     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
// );
// $sendgrid = new \SendGrid('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');
// try {
//     $response = $sendgrid->send($email);
//     print $response->statusCode() . "\n";
//     print_r($response->headers());
//     print $response->body() . "\n";
// } catch (Exception $e) {
//     echo 'Caught exception: '. $e->getMessage() ."\n";
// }
?> 
