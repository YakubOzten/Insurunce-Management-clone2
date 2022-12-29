<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apply;
use App\Models\Contact;
use App\Models\Policy;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Illuminate\Pagination\Paginator;


class AdminController extends Controller
{  public function redirects(){
    $role=Auth::user()->role;
    $policyies = Policy::with('category')->paginate(5);
    $categories = Category::all();
    if ($role== '1'){
        return view('Admin.index',compact('policyies','categories'));
    }
    else
    {
        return view('Customer.askquestion');
    }
}

    public function index()
    {
//        $data["title"] = "anasayfa";
//        $data["content"] = view("admin.urunler.main");
        $policyies = Policy::with('category')->paginate(5);
        $categories = Category::all();

        return view("admin.index", compact('policyies','categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }
    public function store(Request $request)
    {
//        $request->validate(['name'=>'required|min:2',
//            'price'=> 'required'
//        ]);
        $input = $request->all();
        $policies=new Policy();
//        if ($request->hasFile('image'))
//        {
//            $file=$request->file('image');
//            $ext = $file->getClientOriginalExtension();
//            $filename=time().'.'.$ext;
//            $file->move('storage/images/products/',$filename);
//            $products->image=$filename;
//        }
        $policies->category_id=$request->input('category_id');
        $policies->policy_name=$request->input('policy_name');


        $policies->premium=$request->input('premium');
        $policies->Kul_suresi=$request->input('Kul_suresi');
//        $policies->status=$request->input('status') == TRUE ? '1' : '0';

        $policies->save();



            return redirect('anasayfa')->with('status','Kayıt Başarılı');
    }

    public function edit($policy)
    {
        $categories = Category::all();
        $policy = Policy::find($policy);
        return view('admin.edit', compact('policy', 'categories'));
    }

    public function update(Request $request, $pl_id)
    {


        $input = $request->all();
        $policies = Policy::find($pl_id);
        $policies->category_id=$request->input('category_id');
        $policies->policy_name=$request->input('policy_name');
        $policies->premium=$request->input('premium');
        $policies->Kul_suresi=$request->input('Kul_suresi');
//        $policies->status=$request->input('status') == TRUE ? '1' : '0';

        $policies->update();





        return response()->json(['status' => "Kayıt Başarılı."]);
    }
    public function delete($id)
    {

        Policy::find($id)->delete();
//        $serv_pol=Policy::findOrFail($id);
//        $serv_pol->delete();
//        $del=Policy::find($policy);
//        if ($del == Policy::find($policy)) {
//            echo "swal('Archived!', 'Click ok to see!', 'success')";
//        } else {
//            echo "Error Archiving record: " . $conn->error;
//        }

//        session()->flash('message','Ürün  Silme işlemi başarılı.');
//        return redirect()->back();
      return response()->json(['status' => "Silme işlemi Başarılı."]);
    }

    public function category_index()
    {
        $data["title"] = "anasayfa";
//        $data["content"] = view("admin.urunler.main");
//        $categories = Category::all();

        $categories=DB::table('categories')->paginate(10);


        return view("admin.category.index", compact('categories',));
    }

    public function category_create()
    {
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }
    public function catedit($category)
    {
        $category = Category::find($category);
        return view('admin.category.edit', compact( 'category'));
    }


    public function category_store(Request $request)
    {

        $input = $request->all();
        $category=new Category();
//        if ($request->hasFile('image'))
//        {
//            $file=$request->file('image');
//            $ext=$file->getClientOriginalExtension();
//            $filename=time().'.'.$ext;
//            $file->move('storage/images/Categories/',$filename);
//            $category->image=$filename;
//        }
        $category->category_name=$request->input('category_name');
        $category->save();
//        session()-> flash('message',$input['name'].' kaydı başarılı.');
        return redirect('cat-anasayfa')->with('status','Kayıt Başarılı');
    }
    public function cat_update(Request $request, $pr_id){
        $input = $request->all();
        $category = Category::find($pr_id);
//        if ($request->hasFile('image')){
//            $path='storage/images/Categories/'.$category->image;
//            if (File::exists($path))
//            {
//                File::delete($path);
//            }
//            $file=$request->file('image');
//            $ext=$file->getClientOriginalExtension();
//            $filename=time().'.'.$ext;
//            $file->move('storage/images/Categories/',$filename);
//            $category->image=$filename;
//        }
        $category->category_name=$request->input('category_name');
        $category->update();
//        session()->flash('message',$input['name'].' Güncelleme başarılı.');
        return redirect('cat-anasayfa')->with('status','Kayıt Başarılı');
    }
    public function catdelete($id)
    {
        Category::find($id)->delete();

//        session()->flash('message','Ürün  Silme işlemi başarılı.');
        return response()->json(['status' => "Silme işlemi Başarılı."]);
    }
    public function  apply_history(){

        $pols=Apply::all();
        return view('Admin.apppolicy.policy',compact('pols'));
    }
    public function  finish_apply(){
        $pols=Apply::all();
        return view('Admin.apppolicy.finishpolice',compact('pols'));
    }


    public function update_pol(Request $request){
        $pol_id=$request->input('policy_id');
        $pols=Apply::find($pol_id);
        $pols->status =1;
        $pols->update();

        return response()->json(['status' => "Poliçe Başvurusu Onaylandı."]);


    }
    public function app_delete($id)
    {

        Apply::find($id)->delete();
        return response()->json(['status' => "Silme işlemi Başarılı."]);
    }

    public function question_index(){

        $quests=DB::table('questions')->paginate(5);
        return view('Admin.questions.index',compact('quests'));
    }
    public function question_edit($quest)
    {
        $quests = Question::find($quest);
        return view('admin.questions.edit', compact( 'quests'));
    }
    public function question_update(Request $request, $q_id){
        $input = $request->all();
        $quests = Question::find($q_id);

        $quests->admin_comment=$request->input('val-admin_comment');


        $quests->update();
//        session()->flash('message',$input['name'].' Güncelleme başarılı.');
        return redirect('questions-index');
    }
    public function quest_delete($id)
    {

        Question::find($id)->delete();
        return response()->json(['status' => "Silme işlemi Başarılı."]);
    }
    public function contact(){

        $contacts=DB::table('contacts')->paginate(5);
        return view('Admin.contact.index',compact('contacts'));
    }
    public function contact_delete($id)
    {

        Contact::find($id)->delete();
        return response()->json(['status' => "Silme işlemi Başarılı."]);
    }
  public function uyebil(){

    $users=DB::table('users')->paginate(5);
    return view('Admin.userinfo.index',compact('users'));
}
    public function user_update(Request $request,$user){
        $input = $request->all();
        $users = User::find($user);

        $users->name=$request->input('val_name');
        $users->email=$request->input('val_email');
        $users->role=$request->input('role_id');
        $users->update();
//        session()->flash('message',$input['name'].' Güncelleme başarılı.');
        return redirect('uyebilgileri')->with('status','Güncelleme Başarılı');
    }

    public function user_delete($id)
    {

        User::find($id)->delete();
        return response()->json(['status' => "Silme işlemi Başarılı."]);
    }
}
