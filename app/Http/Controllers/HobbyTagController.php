<?php

namespace App\Http\Controllers;

use App\Hobby;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HobbyTagController extends Controller
{
    public function getFilteredHobbies($tag_id) {
        $tag = Tag::findOrFail($tag_id);
        $hobbies = $tag->filteredHobbies()->paginate(10);
        return view('hobby.index', [
            'hobbies' => $hobbies,
            'filter' => $tag
        ]);
    }

    public function attachTag($hobby_id, $tag_id) {
        $hobby = Hobby::find($hobby_id);

        if (Gate::denies('connect_hobbyTag', $hobby)) {
            abort(403);
        }

        $tag = Tag::find($tag_id);
        $hobby->tags()->attach($tag_id);
        return back()->with([
            'message_success' => 'The tag ' . $tag->name . ' was added.'
        ]);
    }

    public function detachTag($hobby_id, $tag_id) {
        $hobby = Hobby::find($hobby_id);

        if (Gate::denies('connect_hobbyTag', $hobby)) {
            abort(403);
        }

        $tag = Tag::find($tag_id);
        $hobby->tags()->detach($tag_id);
        return back()->with([
            'message_success' => 'The tag ' . $tag->name . ' was removed.'
        ]);
    }
}
