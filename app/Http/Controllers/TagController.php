<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'string'
        ]);

        $tag = Tag::create($request->all());

        return response()->json($tag);
    }

    public function retrieve(Request $request, $id)
    {
        $tag = Tag::find($id);

        if (! $tag) {
            abort(404);
        }

        return response()->json($tag);
    }

    public function retrieveAll(Request $request)
    {
        $query = Tag::select('*');

        if ($request->has('q')) {
            $query->where('name', 'like', "%{$request->get('q')}%");
        }

        $tags = $query->get();

        return response()->json($tags);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        if (! $tag) {
            abort(404);
        }

        $tag->fill($request->all());
        $tag->save();

        return response()->json($tag);
    }

    public function delete($id)
    {
        $tag = Tag::find($id);

        if (! $tag) {
            abort(404);
        }

        $tag->delete();

        return response(null, 204);
    }
}
