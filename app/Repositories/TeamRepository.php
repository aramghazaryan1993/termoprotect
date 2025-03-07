<?php


namespace App\Repositories;


use App\Models\Team;
use Illuminate\Support\Str;

class TeamRepository
{
    public function create(array $data)
    {
        $teams = new Team();

        if(!empty($data['img']))
        {
            $teams->addMedia($data['img'])
                ->withCustomProperties(['home' => true])
                ->usingFileName(Str::random(10) . '.' . $data['img']->getClientOriginalExtension())
                ->toMediaCollection('teams');

        }
        $teams->save();

        foreach($data['langs'] as $key => $item) {

            $teams->localizations()->create([
                'name' => $item['name'],
                'position' => $item['position'],
                'text' => $item['text'],
                'slider_id ' => $teams->team_id,
                'lang' => $key
            ]);
        }
        return $teams;
    }

    public function update(array $data)
    {
        $teams = Team::find($data['id']);

        if (!empty($data['img'])) {

            $teams->clearMediaCollection('teams');
            $teams->addMedia($data['img'])
                ->withCustomProperties(['home'=> true])
                ->usingFileName(Str::random(10).'.'.$data['img']->getClientOriginalExtension())
                ->toMediaCollection('teams');
        }

        $teams->save();

        foreach($data['langs'] as $key => $item) {

            $teams->localizations()->where('lang',$key)->update([
                'name' => $item['name'],
                'position' => $item['position'],
                'text' => $item['text'],
            ]);
        }
    }

    public function destroy(int $id)
    {
        $deleteTeam = Team::find($id);
        $deleteTeam->delete();
        return $deleteTeam;
    }
}
