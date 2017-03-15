### Fractal-commands commands for using Fractal on Laravel's project. 
For more about Fractal Please go to [Fractal Document](http://fractal.thephpleague.com/). 

#### Commands
 * php artisan fractal:init (create App/Api/Tranformer/ and Controllers/ApiControler) 
 * php artisan tranformer:create {Tranformer} --model={model} (Create Tranformer in App\Api\Tranformer\) 
 
 ### Usages 
 To use fractal on your controller, extend the Controller first which is created by the fractal:init command. 
 Then call the tranform method povided by the Api Controller and pass the Sepcific tranformer class. 
 ```php 
 $this->transform(Post::all(), new PostTransformer); 
 ``` 
 To tranform single item (model), use tranform command
 ```php
 $this->transform(Post::find(1), new PostTransformer); 
 ```
 :warning: Call the parenet's (ApiController) constructor  if you want to extend the Controller's constructor 
 ```php 
 parent::__construct(); 
 ``` 
 The tranformer:create command will create the layout for your Tranformer in the App/Api/Tranformer Directory.

 ### Lincence
 MIT

