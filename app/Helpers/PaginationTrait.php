<?php namespace App\Helpers;

trait PaginationTrait {

    public $limit;
    public $input;
    public $pagination;

    public function processInput($input)
    {
        $this->input = $input;
        $this->setLimit();
    }

    protected function setLimit()
    {
        if(isset($this->input['limit']))
        {
            $this->limit = $this->input['limit'];
        }
        else
        {
            $this->limit = 5;
        }
    }

    protected function getPagination($data, $model = false)
    {
        $data = $data->toArray();
        $pagination                         = [];
        $pagination['total']                = ($model == true) ? $model->count() : null;
        $pagination['to']                   = $data['to'];
        $pagination['from']                 = $data['from'];
        $pagination['per_page']             = $data['per_page'];
        $pagination['next_page_url']        = $data['next_page_url'];
        //$pagination['last_page']          = $data['last_page'];
        $pagination['current_page']         = $data['current_page'];
        $this->pagination                   = $pagination;
        return $pagination;
    }
}