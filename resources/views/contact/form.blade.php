<div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <input type="text" class="form-control mt-2" placeholder="Name" required name="name" value="{{old('name')??$contacts->name}}">
				<div>
			{{$errors->first('name')}}
			</div>
              </div>
            </div>
           <div class="col-lg-6">
              <div class="form-group">
                <input type="text" class="form-control mt-2" placeholder="LastName" required name="lastname" value="{{$contacts->lastname}}">
				<div>
			{{$errors->first('lastname')}}
			</div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input type="email" class="form-control mt-2" placeholder="Email" required name="email" value="{{$contacts->email}}">
				<div>
			{{$errors->first('email')}}
			</div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input type="number" class="form-control mt-2" placeholder="Tele:" required name="phone" value="{{$contacts->phone}}">
				<div>
			{{$errors->first('phone')}}
			</div>
              </div>
            </div>
			   <div class="col-lg-6">
              <div class="form-group">
                <input type="number" class="form-control mt-2" placeholder="Pincode:" required name="pincode" value="{{$contacts->pincode}}">
				<div>
			{{$errors->first('pincode')}}
			</div>
              </div>
            </div>
			<div class="col-lg-6">
              <div class="form-group">
                <select name="active" id="active" class="form-control mt-2">
				<option value="" disabled>Select Status</option>
				<option value="1" {{$contacts->active=='Active'?'selected':''}}>Active</option>
				<option value="0" {{$contacts->active=='Inactive'?'selected':''}}>Inactive</option>
				
				</select>
              </div>
            </div>
			
			   <div class="col-12 cmp">
              <div class="form-group">
					<select name="company_id" id="company_id" class="form-control" value="{{$contacts->company->name}}">
				<option value="1">ABC Company</option>
				<option value="2">DEF Company</option>
				</select>
              </div>
            </div>
			
			
            <div class="col-12">
              <div class="form-group">
                <textarea class="form-control" rows="4" required name="message" placeholder="Message.." value="{{$contacts->message}}">
				</textarea>
              </div>
            </div>
			 </div>
		  @csrf