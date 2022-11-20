<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillsRequest;
use App\Http\Resources\V1\SkillCollection;
use App\Http\Resources\V1\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        // return SkillResource::collection(Skill::all());
        return new SkillCollection(Skill::all());
        // return new SkillCollection(Skill::paginate(1));
    }
    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }
    public function store(StoreSkillsRequest $request)
    {
        Skill::create($request->validated());
        return response()->json('Skill Created');
    }
    public function update(StoreSkillsRequest $request, Skill $skill)
    {
        $skill->update($request->validated());
        return response()->json('Skill Update');
    }
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json('Skill Delete');
    }
}
