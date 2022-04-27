<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\BlogNews;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogNewsRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @var BlogNewsRepository
     */
    private $blogNewsRepository;
    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    public function __construct(BlogNewsRepository $blogNewsRepository,BlogCategoryRepository $blogCategoryRepository){
        $this->blogNewsRepository = $blogNewsRepository;
        $this->blogCategoryRepository = $blogCategoryRepository;
    }
    public function index()
    {
        $paginator = $this->blogNewsRepository->getAllWithPaginate();
        $userCurrentType = auth()->user()->type;

        return view('blog.news.index' , compact('paginator' , 'userCurrentType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogNews();
        $categoryList
            = $this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.news.create' ,
            compact('item' , 'categoryList')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $item = (new BlogNews())->create($data);

        if($item){
            return  redirect()->route('blog.news.index' , [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        }else{
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
