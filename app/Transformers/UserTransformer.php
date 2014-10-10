<?php namespace App\Transformers;


class UserTransformer extends TransformerFactory {

    public function collectionCallback($data)
    {
        return [
            'id'        => (int) $data['id'], //In some cases we are using uuid
            'mail'      => $data['email'], //example of hiding DB name from API
            'links'     => [ //this hypermedia info
                [
                    'rel'   => 'self',
                    'uri'   => '/api/v1/users/'. $data['id']
                ]
            ]
        ];
    }
}