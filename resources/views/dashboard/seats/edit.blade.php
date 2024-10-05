<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class ="bg-dark py-3">
        <h3 class="text-white text-center">Seats Information</h3>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    </div>

    <div class="containeer">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card brode-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white"> Edit seats</h3>
                    </div>
                    <div class="card-body">
        {{-- <form action="{{ route('seats.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
            <div class="mb-4"> 
                    <label for="seat-code" class="form-label h5">  Seat-code</label>
                    <select id="seat-code" name="seatCode">
                        <option value="A12">A12</option>
                        <option value="B5">B5</option>
                        <option value="C15">C15 </option>
                        <option value="D7">D7</option>
                    </select>
                @error('seatCode')
                            <div class="text-danger my-2">{{ $message }}</div>
                @enderror
            </div>
    
            
            <div class="mb-4">
                <p class="form-label h5">Is_Booked</p>
                  <input  value="{{ old('isBooked') }}" type="radio" name="isBooked" value="true">
                  <label for="Booked">Booked</label><br>
                  <input  value="{{ old('isBooked') }}" type="radio" name="isBooked" value="false">
                  <label for="not booked">Not Booked</label><br>
            
                @error('isBooked')
                    <div class="text-danger my-2">{{ $message }}</div>
                @enderror
            </div>
                
        
        
                        <div class="mb-4">
                            <p class="form-label h5" h5 >Under Mintinance</p>
                            <label>
                                <input  value="{{ old('under_maintainance') }}" type="radio" name="under_maintainance" value="true">True</label>
                                <label>
                                <input value="{{ old('under_maintainance') }}" type="radio" name="under_maintainance" value="false">False</label>
                        
                                @error('under_maintainance')
                                    <div class="text-danger my-2">{{ $message }}</div>
                                @enderror
                        </div>

                                    <input type="submit" value="Submit">
    
        </form> --}}

{{-- 
        <form action="{{ route('seats.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <!-- Seat Code -->
            <div class="mb-4">
                <label for="seat-code" class="form-label h5">Seat Code</label>
                <select id="seat-code" name="seatCode">
                    <option value="A12" {{ old('seatCode') == 'A12' ? 'selected' : ''$seat->seat_code}}>A12</option>
                    <option value="B5" {{ old('seatCode') == 'B5' ? 'selected' : '' , $seat->seat_code}}>B5</option>
                    <option value="C15" {{ old('seatCode') == 'C15' ? 'selected' : '', $seat->seat_code }}>C15</option>
                    <option value="D7" {{ old('seatCode') == 'D7' ? 'selected' : '', $seat->seat_code}}>D7</option>
                </select>
                @error('seatCode')
                    <div class="text-danger my-2">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- Is Booked -->
            <div class="mb-4">
                <p class="form-label h5">Is Booked</p>
                <input type="radio" name="isBooked" value="1" {{ old('isBooked') == '1' ? 'checked' : '',$seat->isBooked }}> Booked
                <input type="radio" name="isBooked" value="0" {{ old('isBooked') == '0' ? 'checked' : '',$seat->isBooked }}> Not Booked
                @error('isBooked')
                    <div class="text-danger my-2">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- Under Maintenance -->
            <div class="mb-4">
                <p class="form-label h5">Under Maintenance</p>
                <input type="radio" name="under_maintainance" value="1" {{ old('under_maintainance') == '1' ? 'checked' : ''  ,$seat->under_maintainance}}> True
                <input type="radio" name="under_maintainance" value="0" {{ old('under_maintainance') == '0' ? 'checked' : '' ,$seat->under_maintainance}}> False
                @error('under_maintainance')
                    <div class="text-danger my-2">{{ $message }}</div>
                @enderror
            </div>
        
            <input type="submit" value="Submit">
        </form>
        --}}
        <form action="{{ route('seats.update',$seat->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            @method('patch')
            @csrf
            <!-- Seat Code -->
            <div class="mb-4">
                <label for="seat-code" class="form-label h5">Seat Code</label>
                <select id="seat-code" name="seatCode">
                    <option value="A12" {{ old('seatCode') == 'A12' || (isset($seat) && $seat->seat_code == 'A12') ? 'selected' : '' }}>A12</option>
                    <option value="B5" {{ old('seatCode') == 'B5' || (isset($seat) && $seat->seat_code == 'B5') ? 'selected' : '' }}>B5</option>
                    <option value="C15" {{ old('seatCode') == 'C15' || (isset($seat) && $seat->seat_code == 'C15') ? 'selected' : '' }}>C15</option>
                    <option value="D7" {{ old('seatCode') == 'D7' || (isset($seat) && $seat->seat_code == 'D7') ? 'selected' : '' }}>D7</option>
                </select>
                @error('seatCode')
                    <div class="text-danger my-2">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- Is Booked -->
            <div class="mb-4">
                <p class="form-label h5">Is Booked</p>
                <input type="radio" name="isBooked" value="1" {{ old('isBooked') == '1' || (isset($seat) && $seat->is_booked == 1) ? 'checked' : '' }}> Booked
                <input type="radio" name="isBooked" value="0" {{ old('isBooked') == '0' || (isset($seat) && $seat->is_booked == 0) ? 'checked' : '' }}> Not Booked
                @error('isBooked')
                    <div class="text-danger my-2">{{ $message }}</div>
                @enderror
            </div>
        
            <!-- Under Maintenance -->
            <div class="mb-4">
                <p class="form-label h5">Under Maintenance</p>
                <input type="radio" name="under_maintainance" value="1" {{ old('under_maintainance') == '1' || (isset($seat) && $seat->under_maintainance == 1) ? 'checked' : '' }}> True
                <input type="radio" name="under_maintainance" value="0" {{ old('under_maintainance') == '0' || (isset($seat) && $seat->under_maintainance == 0) ? 'checked' : '' }}> False
                @error('under_maintainance')
                    <div class="text-danger my-2">{{ $message }}</div>
                @enderror
            </div>
        
            <input type="submit" value="Update">
        </form>
            
                </div>

                
                </div>
            </div>
        </div>
    </div>

</body>
</html>

