@extends('layouts.admintemplate')

@section('title')
{{ $single_View->name }}
@endsection


@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 mx-auto text-center">
            <h2>Update Verification</h2>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form action="{{ url('/admin/update', $single_View->slug) }}" accept-charset="UTF-8" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <input class="form-control my-2" value="{{$single_View->name}}" type="text" name="name"
                            pattern="[\u0980-\u09FF\s]+" title="দয়া করে শুধুমাত্র বাংলায় লিখুন"
                            placeholder="বাংলায় পূর্ণ নাম লিখুন" oninput="checkBanglaInput(this)" />
                    </div>

                    <div class="col-12 col-md-6">
                        <select name="gender" id="gender" class="form-control my-2">
                            <option value="">লিঙ্গ</option>
                            <option value="পুরুষ" {{ $single_View->gender == 'পুরুষ' ? 'selected' : '' }}>পুরুষ</option>
                            <option value="মহিলা" {{ $single_View->gender == 'মহিলা' ? 'selected' : '' }}>মহিলা</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <input class="form-control my-2" type="text" value="{{ $single_View->occ }}" name="occ"
                            pattern="[\u0980-\u09FF\s]+" title="দয়া করে শুধুমাত্র বাংলায় লিখুন" placeholder="পেশা"
                            oninput="checkBanglaInput(this)" />
                    </div>
                    <div class="col-12">


                        <textarea class="form-control my-2" name="add" rows="1" cols="50" pattern="[\u0980-\u09FF\s]+"
                            title="দয়া করে শুধুমাত্র বাংলায় লিখুন" placeholder="বাংলায় বর্তমান ঠিকানা"
                            oninput="checkBanglaInput(this)">{{ $single_View->add }}</textarea>
                    </div>

                    <div class="col-12">
                        <input type="text" value="{{ $single_View->batch_no }}" class="form-control my-2"
                            name="batch_no" pattern="[0-9]{4}" title="আপনার এস.এস.সি পরীক্ষার সন লিখুন"
                            placeholder="ব্যাচ নং (ইংরেজিতে: উদাহরণ- 2005)" />
                    </div>

                    <div class="col-12">
                        <input type="text" value="{{ $single_View->phone }}" class="form-control my-2" name="phone"
                            pattern="[0-9]{11}" title="আপনার ১১ ডিজিটের মোবাইল নম্বর প্রবেশ করুন"
                            placeholder="মোবাইল নং (ইংরেজিতে)" />
                    </div>

                    <div class="col-12">
                        <select name="shirt" class="form-control my-2">
                            <option>টি শার্ট সাইজ বাছাই করুন</option>
                            <option value="XXXL" {{ $single_View->shirt == 'XXXL' ? 'selected' : '' }}>XXXL</option>
                            <option value="XXL" {{ $single_View->shirt == 'XXL' ? 'selected' : '' }}>XXL</option>
                            <option value="XL" {{ $single_View->shirt == 'XL' ? 'selected' : '' }}>XL</option>
                            <option value="L" {{ $single_View->shirt == 'L' ? 'selected' : '' }}>L</option>
                            <option value="M" {{ $single_View->shirt == 'M' ? 'selected' : '' }}>M</option>
                            <option value="S" {{ $single_View->shirt == 'S' ? 'selected' : '' }}>S</option>
                        </select>
                    </div>

                </div>
                <div class="col-12">
                    <select name="blood_group" id="blood_group" class="form-control">
                        <option>রক্ত গ্রুপ বাছাই করুন</option>
                        <option value="O+" {{ $single_View->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                        <option value="A+" {{ $single_View->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                        <option value="AB+" {{ $single_View->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                        <option value="O-" {{ $single_View->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                        <option value="A-" {{ $single_View->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                        <option value="AB-" {{ $single_View->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                    </select>
                </div>

                <div class="col-12 my-2">
                    <label for="photo">আইডি কার্ডের জন্য ফরমাল ছবি</label>
                    <input type="file" class="form-control" name="photo" id="photo">

                    <img style="width: 100px; height: 100px" src="{{asset($single_View->photo)}}" alt="">
                </div>
                <div class="col-12 my-2">
                    <input type="number" class="form-control my-2" name="guest" value="{{ $single_View->guest }}"
                        id="guest" placeholder="অতিথি সংখ্যা (ইংরেজিতে লিখুন)" />
                </div>
                <div class="text-center border" style="border-radius: 10px; padding: 5px">
                    <p>
                        রেজিষ্ট্রেশন ফিঃ
                        <span name="regFee" id="regfee">1000</span> টাকা | অতিথি ফিঃ
                        <span name="guestFee" id="guestfee"></span> টাকা
                    </p>
                    <p></p>
                    <p style="font-weight: 800">
                        সর্ব মোট ফিঃ <span name="totalFee" id="totalfee"></span>
                        টাকা
                    </p>
                </div>

                <div class="col-12 my-2 form-control">
                    <p>
                        <img style="width: 75px; height: 44px"
                            src="https://seeklogo.com/images/B/bkash-logo-835789094A-seeklogo.com.png" alt="" />
                        01880040010 নাম্বারে বিকাশ ক্যাশ আউট করুন।
                    </p>
                    <input type="text" class="form-control my-2" name="trxID" id="trxID"
                        value="{{ $single_View->trxID }}" pattern="[a-zA-Z0-9]{10}"
                        title="দয়া করে ১০ ডিজিটের বিকাশ TrxID লিখুন" placeholder="বিকাশ TrxID লিখুন (10 অক্ষর)" />
                </div>


                <div class="col-12 bg-danger mb-5">
                    <button type="submit" class="btn btn-info w-100">
                        হালনাগাদ করুন
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>



<script>
// Wait for the document to be fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Get references to HTML elements
    var guestInput = document.getElementById("guest");
    var regFeeElement = document.getElementById("regfee");
    var guestFeeElement = document.getElementById("guestfee");
    var totalFeeElement = document.getElementById("totalfee");

    // Function to update fees based on guest count
    function updateFees() {
        var guestCount = parseInt(guestInput.value) ||
            0; // Parse guest count as integer, default to 0 if invalid
        var regFee = 1000; // Registration fee per person

        // Calculate guest fee
        var guestFee = guestCount * regFee;

        // Calculate total fee
        var totalFee = regFee + guestFee;

        // Update HTML elements with calculated fees
        guestFeeElement.textContent = guestFee.toLocaleString(); // Display guest fee with commas
        totalFeeElement.textContent = totalFee.toLocaleString(); // Display total fee with commas
    }

    // Add event listener to guest input for real-time updates
    guestInput.addEventListener("input", updateFees);

    // Initial update when the page loads
    updateFees();
});
</script>

@endsection