<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const PAGINATION = 15;

    /**
     * user 一覧ページ
     * @param  Request $request
     * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = User::search($request)->paginate(self::PAGINATION);
        return view('user.index', compact('users'));
    }

    /**
     * user 新規登録ページ
     * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('user.edit');
    }

    /**
     * user 新規登録保存処理
     * @param  ClientRequest $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        return redirect()->route('user.show', compact('user'))->with('success', __('message.success'));
    }

    /**
     * user 詳細ページ
     * @param  Client $client
     * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * user 編集ページ
     * @param  Client $client
     * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * user 更新処理
     * @param  ClientRequest $request
     * @param  Client $client
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return back()->with('success', __('message.success'));
    }

    /**
     * user 削除処理
     * @param  Client $client
     * @return  \Illuminate\Http\RedirectResponse
     * @throws  \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', __('message.success'));
    }
}
