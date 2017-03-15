<?php echo"<?php"?>

namespace App\Api\Tranformer;

use App\{{ $model}};
use League\Fractal\TransformerAbstract;

class {{ $class }} extends TransformerAbstract{ 

    public function transform({{$model . "  $" . lcfirst($model) }})
	{
	    return [
	    ];
	}

}
