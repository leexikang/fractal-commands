<?php echo "<?php" ?>

namespace App\Http\Controllers;

use League\Fractal\Manager;
use Illuminate\Http\Request;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ApiController extends Controller
{
    private $fractal;

    /**
     * @param mixed $fractal
     */

    public function __construct()
    {
        $this->fractal = new Manager();
    }

    public function transform($data, $transformer)
    {    
        $resource = new Collection($data, $transformer);
        return $data = $this->fractal->createData($resource)->toJson();
    }


    public function transformItem($data, $transformer)
    {    
        $resource = new Item($data, $transformer);
        return $data = $this->fractal->createData($resource)->toJson();
    }

}
