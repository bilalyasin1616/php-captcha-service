# Simple Php Captcha
This captcha can be used with any framework, does not have any external dependencies or need any package. Just add this services to your project services, include the class to you controller and use the captcha

## php-session-captcha
This uses simple php serssion $_SESSION for storing storing captcha information

## symfony-session-captcha
This uses symfony's session which you can get from the current request and then pass to captcha initilization function

## How to use
- Add captcha service to your service folder and change the namespace of CaptchaService.php if needed
- Add namespace of captcha service to your controller
- Call the static function StartCaptcha from CaptchaService and keep its return value in a variable
- Return value of Captcha service will contain the image URL for the captcha image which you will use to show image on UI
- Pass the image URL to you view
- Add captchaAction to one of your controllers, this will be used to generate the captcha image and return if for call from UI. This action is available in Controller.php as a sample
- You can validate the captcha on form submission by matching its value to "captchaCode" key from session