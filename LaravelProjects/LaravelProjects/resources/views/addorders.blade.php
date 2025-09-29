<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Order</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f8f9fa;
      margin: 0;
      padding: 20px;
    }

    .form-container {
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    h3 {
      margin-bottom: 20px;
      font-size: 18px;
      color: #333;
    }

    .form-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    .form-group label {
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 6px;
      color: #444;
    }

    .form-group input,
    .form-group select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    .form-actions {
      margin-top: 20px;
      text-align: right;
    }

    .form-actions button {
      padding: 10px 18px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
      font-size: 14px;
      margin-left: 10px;
    }

    .btn-submit {
      background: #006d40;
      color: #fff;
    }

    .btn-reset {
      background: #006dff;
      color: #fff;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h3>Add Order</h3>
  <form action="{{route('store')}}" method="post">
    @csrf
    @method('post')
    <div class="form-grid">

      <div class="form-group">
        <label for="products">Number of Products*</label>
        <input type="number" name="number_of_products" id="products" placeholder="e.g. 5">
      </div>

      <div class="form-group">
        <label for="customer">Customer Name*</label>
        <input type="text" name="cutomerName" id="customer" placeholder="e.g. John Doe">
      </div>

      <div class="form-group">
        <label for="mobile">Mobile Number*</label>
        <input type="tel" name="mobile_number" id="mobile" placeholder="e.g. +91 9876543210">
      </div>

      <div class="form-group">
        <label for="bookby">Book By*</label>
        <input type="text" name="book_by" id="bookby" placeholder="e.g. D">
      </div>

      <div class="form-group">
        <label for="mode">Order Mode*</label>
        <select id="mode" name="order_mode">
          <option value="">Select</option>
          <option value="B2C">B2C</option>
          <option value="B2B">B2B</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="time">Order Time*</label>
        <input type="time" name="time" id="time">
      </div>

      <div class="form-group">
        <label for="startdate">Contract Start Date*</label>
        <input type="date" name="contract_start_date" id="startdate" min="{{ date('Y-m-d') }}">
      </div>

      <div class="form-group">
        <label for="enddate">Contract End Date*</label>
        <input type="date" name="contract_end_date" id="enddate">
      </div>


      <div class="form-group">
        <label for="coupan">Coupon</label>
        <select id="coupan" name="coupan">
          <option value="">-Select Coupan-</option>
          <option value="H5">H5 - 5% OFF</option>
          <option value="H10">H10 - 10% OFF</option>
          <option value="H15">H15 - 15% OFF</option>
          <option value="HMSCP">HMSCP - 29.8% OFF</option>
        </select>
      </div>

      <div class="form-group">
        <label for="address">Address*</label>
        <input type="text" name="address" id="address" placeholder="e.g. Near Ganesh Temple, Vasco, India">
      </div>
    </div>

    <div class="form-actions">
      <button type="reset" class="btn-reset">Reset</button>
      <button type="submit" class="btn-submit">Submit Order</button>
    </div>
  </form>
</div>

    @if($errors->any())
    <p>{{ $errors->first() }}</p>
    @endif

</body>
</html>
