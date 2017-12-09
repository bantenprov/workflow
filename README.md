# Workflow Management
Workflow management for easily manage states and transitions in a complex business prosess.
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/workflow/badges/quality-score.png?b=1.0)](https://scrutinizer-ci.com/g/bantenprov/workflow/?branch=1.0)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/workflow/badges/build.png?b=1.0)](https://scrutinizer-ci.com/g/bantenprov/workflow/build-status/1.0)

The final of this package will be contained some awesome feature:

## Worklow
- Define a name and descriotion of the workflow, each conte type could containt more then one workflow to manage their business process

## State
- Define a collection of state name in worflow related, and describe the latest status the content in a business process  

## Transition
- Define a transition of any state in content, this feature will be handle move transition  

## Guard
- Guard give a permission to manage one or any authorization of the role management to the transition related  

## Notification
- When a state of content was change, or a transition executed a notification will be sent by system to pic related. notification displayed in user desktop related and as mail notification.

## TODO
See [TODO](https://github.com/bantenprov/workflow/blob/1.0/TODO.md) before use this.

## DEMO
Demo site for this packages is available here : [Workflow](http://workflow-01.dev.bantenprov.go.id/). 

## Install Laravel :
```bash
$ composer create-project --prefer-dist laravel/laravel project-name "5.4.*"
```

## Install package :

```bash
$ composer require bantenprov/workflow "1.0.0"
```

## Edit config/app.php
### providers

```php
'providers' => [
    ...
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    ...
    Collective\Html\HtmlServiceProvider::class,
    'That0n3guy\Transliteration\TransliterationServiceProvider',
    Bantenprov\Workflow\WorkflowServiceProvider::class,
```

### aliases
```php
'aliases' => [
    ...
    'Storage' => Illuminate\Support\Facades\Storage::class,
    'URL' => Illuminate\Support\Facades\URL::class,
    'Validator' => Illuminate\Support\Facades\Validator::class,
    'View' => Illuminate\Support\Facades\View::class,
    ...
    'Form' => Collective\Html\FormFacade::class,
    'Html' => Collective\Html\HtmlFacade::class,
    'Workflow' => Bantenprov\Workflow\Facades\Workflow::class,
```

## Artisan command :

```bash
$ php artisan vendor:publish --tag=workflow_migrations
$ php artisan vendor:publish --tag=workflow_views
$ php artisan vendor:publish --tag=workflow_css
$ php artisan vendor:publish --tag=workflow_js
$ php artisan migrate
```

## Contoh penggunaan :

### Trait :
#### **1. WorkflowStateTrait**

```php
use Bantenprov\Workflow\Traits\WorkflowStateTrait;

class WorkflowStateController extends Controller
{
    use WorkflowStateTrait;

    public function index()
    {
        return WorkflowStateTrait::stateIndex();
    }
}
```

#### **2. WorkflowTransitionTrait**
```php
use Bantenprov\Workflow\Traits\WorkflowTransitionTrait;

class WorkflowTransitionController extends Controller
{
    use WorkflowTransitionTrait;

    public function index()
    {
        return WorkflowStateTrait::transitionIndex();
    }
}
```


### **WorkflowStateTrait sample**

<div class="tg-wrap"><table class="tg">
  <tr>
    <th class="tg-amwm">#<br></th>
    <th class="tg-amwm">Method</th>
    <th class="tg-amwm">NULL</th>
    <th class="tg-amwm">Default</th>
    <th class="tg-amwm">Ex</th>
    <th class="tg-amwm">Type</th>
  </tr>
  <tr>
    <td class="tg-yw4l">1</td>
    <td class="tg-yw4l">stateIndex($page = 10)</td>
    <td class="tg-amwm">Y</td>
    <td class="tg-yw4l">10</td>
    <td class="tg-yw4l">$page=10</td>
    <td class="tg-yw4l">Integer</td>
  </tr>
  <tr>
    <td class="tg-yw4l">2</td>
    <td class="tg-yw4l">stateCreate()</td>
    <td class="tg-amwm">Y</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">-</td>
  </tr>
  <tr>
    <td class="tg-yw4l">3</td>
    <td class="tg-yw4l">stateStore($request,= array())</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">$request-&gt;all()</td>
    <td class="tg-yw4l">Array<br></td>
  </tr>
  <tr>
    <td class="tg-yw4l">4</td>
    <td class="tg-yw4l">stateEdit($id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-<br></td>
    <td class="tg-yw4l">$id = 1<br></td>
    <td class="tg-yw4l">Integer<br></td>
  </tr>
  <tr>
    <td class="tg-yw4l">5</td>
    <td class="tg-yw4l">stateUpdate($request= array(), $id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-<br></td>
    <td class="tg-yw4l">$request-&gt;all()<br>$id = 1<br></td>
    <td class="tg-yw4l">Array</td>
  </tr>
  <tr>
    <td class="tg-yw4l">6</td>
    <td class="tg-yw4l">stateActive($id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">$id = 1<br></td>
    <td class="tg-yw4l">Integer</td>
  </tr>
  <tr>
    <td class="tg-yw4l">7</td>
    <td class="tg-yw4l">stateDeActive($id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">$id = 1<br></td>
    <td class="tg-yw4l">Integer</td>
  </tr>
</table></div>

### **WorkflowTransitionTrait sample**


<table class="tg">
  <tr>
    <th class="tg-amwm">#<br></th>
    <th class="tg-amwm">Method</th>
    <th class="tg-amwm">NULL</th>
    <th class="tg-amwm">Default</th>
    <th class="tg-amwm">Ex</th>
    <th class="tg-amwm">Type</th>
  </tr>
  <tr>
    <td class="tg-yw4l">1</td>
    <td class="tg-yw4l">transitionIndex($page = 10)</td>
    <td class="tg-amwm">Y</td>
    <td class="tg-yw4l">10</td>
    <td class="tg-yw4l">$page=10</td>
    <td class="tg-yw4l">Integer</td>
  </tr>
  <tr>
    <td class="tg-yw4l">2</td>
    <td class="tg-yw4l">transitionCreate()</td>
    <td class="tg-amwm">Y</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">-</td>
  </tr>
  <tr>
    <td class="tg-yw4l">3</td>
    <td class="tg-yw4l">transitionStore($request = array())</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">$request-&gt;all()</td>
    <td class="tg-yw4l">Array<br></td>
  </tr>
  <tr>
    <td class="tg-yw4l">4</td>
    <td class="tg-yw4l">transitionEdit($id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-<br></td>
    <td class="tg-yw4l">$id = 1<br></td>
    <td class="tg-yw4l">Integer<br></td>
  </tr>
  <tr>
    <td class="tg-yw4l">5</td>
    <td class="tg-yw4l">transitionUpdate($request = array(), $id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-<br></td>
    <td class="tg-yw4l">$request-&gt;all()<br>$id = 1<br></td>
    <td class="tg-yw4l">Array</td>
  </tr>
  <tr>
    <td class="tg-yw4l">6</td>
    <td class="tg-yw4l">transitionActive($id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">$id = 1<br></td>
    <td class="tg-yw4l">Integer</td>
  </tr>
  <tr>
    <td class="tg-yw4l">7</td>
    <td class="tg-yw4l">transitionDeActive($id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">$id = 1<br></td>
    <td class="tg-yw4l">Integer</td>
  </tr>
</table>

#### **Contoh 2**
> pada aplikasi yang digunakan
```php
//Controller
use Bantenprov\Workflow\Workflow
...
public function SOMETHING()
{
    $id = 1;
    return \Workflow::getStateName($id);
}

```

```php
//Controller
use Bantenprov\Workflow\Workflow
...
public function SOMETHING()
{
    $id = 1;
    return \Workflow::getTransitionName($id);
}

```

### CSS
folder style.css :
public/css/style.css

```html
<!-- layout.blade.php -->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <title>Laravel</title>

        <!-- Fonts -->
  -->   <link href="{{ asset('css/workflow_style.css') }}" rel="stylesheet" type="text/css">

```

### JS
folder custom.js :
public/js/custom.js

```html
<!-- layout.blade.php -->
          
            </div>
        </div>
  -->   <script src="{{ asset('js/workflow_javascript.js') }}"></script>
    </body>
</html>

```

