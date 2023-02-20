<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class PortfolioController extends Controller
{
    //
    public function AllPortfolio(){
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all', compact('portfolio'));
    }//end method

    public function AddPortfolio(){
        return view('admin.portfolio.portfolio_add');
    }

    public function StorePortfolio(Request $request){
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_image' => 'required',
        ],[
            'portfolio_name.required' => 'Portfolio Name is required',
            'portfolio_title.required' => 'Portfolio Title is required',
        ]);

        $image = $request->file('portfolio_image');
        $name_gen = $image->getClientOriginalExtension();

        Image::make($image)->resize(636,852)->save('upload/portfolio/'.$name_gen);
        $save_url = 'upload/portfolio/'.$name_gen;

        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
 
    $notification = array(
        'message' => 'Insert portfolio Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.portfolio')->with($notification);
    }

    public function EditPortfolio($id){

        $portfolio = Portfolio::findOrFail($id);
            return view('admin.portfolio.portfolio_edit', compact('portfolio'));
        
    } //end method


    public function UpdatePortfolio(Request $request){
        $portfolio_id = $request->id;

        if($request->file('portfolio_image')){
            $image = $request->file('portfolio_image');
            $name_gen = $image->getClientOriginalExtension();

            Image::make($image)->resize(636,852)->save('upload/portfolio/'.$name_gen);
            $save_url = 'upload/portfolio/'.$name_gen;

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
                'portfolio_image' => $save_url,
            ]);

        $notification = array(
            'message' => 'Portfolio Updated with Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);
        }else{
            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name' => $request->portfolio_name,
                'portfolio_title' => $request->portfolio_title,
                'portfolio_description' => $request->portfolio_description,
            ]);
            
        $notification = array(
            'message' => 'Portfolio Updated without Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolio')->with($notification);
        }
    }

    public function DeletePortfolio($id){

        $portfolio = Portfolio::findOrFail($id);

        $img = $portfolio->portfolio_image;
        unlink($img);
    
        Portfolio::findOrFail($id)->delete();
    
        $notification = array(
            'message' => 'Multi Image Deleted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function PortfolioDetails($id){

        $portfolio = Portfolio::findOrFail($id);

        return view('frontend.portfolio_details',compact('portfolio'));
    }
}
