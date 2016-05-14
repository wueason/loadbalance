# LoadBalance

## Installation

Simply add a dependency on `wueason/loadbalance` to your project's `composer.json` file if you use [Composer](http://getcomposer.org/) to manage the dependencies of your project.

Here is a minimal example of a `composer.json` file that just defines a dependency on Money:

    {
        "require": {
            "sebastian/money": "^1.6"
        }
    }

## Usage Examples

#### Creating a LoadBalance object and pick a random instance

```php
use Wueason\Loadbalance\RandomEngine;
use Wueason\Loadbalance\BaseInstance;

// Create Loadbalance object with BaseInstance
$pool = array_map(function($a){
            return new BaseInstance($a);
        }, ['A','B','C']);
$lb = new RandomEngine($pool);

// Get the random instance
print $lb->pick();
```