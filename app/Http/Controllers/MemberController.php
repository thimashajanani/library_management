<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function index()
    {
        $members = Member::all();
        return view('member.show', compact('members'));
    }


    public function create()
    {
        return view('member.create');
    }


    public function store(Request $request)
    {
        try {
            $memberData = $request->only([
                'name', 'email', 'phone', 'address'
            ]);
            $member = Member::create($memberData);
            return response()->json(['success' => true, 'message' => 'Member is Successfully Added!', 'member_id' => $member->id]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'error' => $exception->getMessage()]);
        }
    }


    public function show($id)
    {
        try {
            $member = Member::findOrFail($id);
            return response()->json($member);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Member not found']);
        }
    }


    public function edit( $id)
    {
        try {
            $member = Book::findOrFail($id);
            return view('member.edit', compact('member'));
        } catch (\Exception $exception) {
            return back()->with('error', 'Failed to fetch Member details.');
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $member = Member::findOrFail($id);
            $member->update($request->all());
            return redirect()->route('members.show', $member->id)->with('success', 'Member updated successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Failed to update Member details. Please try again.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $member = Member::findOrFail($id);
            $member->delete();
            return response()->json(['message' => 'Member deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete book.']);
        }
    }
}
