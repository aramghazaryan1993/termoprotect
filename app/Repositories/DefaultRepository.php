<?php

namespace App\Repositories;

use App\Models\DefaultData;

class DefaultRepository
{
    public function update(array $data){

        $updateDefaultData = DefaultData::find($data['id']);
        $updateDefaultData->phone_1 = $data['phone_1'];
        $updateDefaultData->phone_2 = $data['phone_2'];
        $updateDefaultData->phone_3 = $data['phone_3'];
        $updateDefaultData->phone_4 = $data['phone_4'];
        $updateDefaultData->phone_5 = $data['phone_5'];
        $updateDefaultData->email = $data['email'];
        $updateDefaultData->websayt = $data['websayt'];
        $updateDefaultData->facebook = $data['facebook'];
        $updateDefaultData->instagram = $data['instagram'];
        $updateDefaultData->viber = $data['viber'];
        $updateDefaultData->whatsapp = $data['whatsapp'];
        $updateDefaultData->telegram = $data['telegram'];
        $updateDefaultData->map_contact = $data['map_contact'];
        $updateDefaultData->map = $data['map'];
        $updateDefaultData->save();

        foreach($data['langs'] as $key => $item) {

            $updateDefaultData->localizations()->where('lang',$key)->update([
                'address' => $item['address'],
                'working' => $item['working'],
            ]);
        }
    }
}
