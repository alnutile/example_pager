<?php
/**
 * Created by PhpStorm.
 * User: alfrednutile
 * Date: 10/10/14
 * Time: 12:18 PM
 */

namespace App;

use App\Helpers\PaginationTrait;
use App\Transformers\UserTransformer;
use League\Fractal\Manager;

class UserService {

    use PaginationTrait;

    protected $users;
    protected $userTransformer;

    public function getPaginatedUsers()
    {
        //This would be injected but see
        // https://github.com/alnutile/base_install_theme/blob/master/app/Services/UserService.php
        //$this->userTransformer = new UserTransformer(new Manager());

        //1. Get the inputs needed in this case just limit
        $this->processInput(\Input::all());
        //2. Inject the model
        $user = new User(); //this would be the repo but this is an example

        //3. User Paginate
        $this->users = $user->paginate($this->limit);
        // example if filtered by something like username
        $users_filtered_total = $user->where("name", "like", "foo");

        //Quick look at methods we have available to us using paginate class
        //dd(get_class_methods($this->users));

        //4. Tranform user input
        //See my other example here https://github.com/alnutile/base_install_theme/blob/master/app/Services/UserService.php#L47
        // this though would remove the

        //5. Setup get pagination output with total
        $this->getPagination($this->users, $users_filtered_total);
//        $resource   = $this->userTransformer->getCollection($this->users['data'], function(array $data){
//            return $this->userTransformer->collectionCallback($data);
//        });
        $users['data'] = $this->users->toArray();
        $users['pagination'] = $this->pagination;
        return $users;
    }

    protected function mergeResultsAndPagination($resource)
    {
        return array_merge($resource, ['pagination' => $this->pagination]);
    }
} 