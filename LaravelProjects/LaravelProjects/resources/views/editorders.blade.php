<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Order</title>
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
  <h3>Edit Order</h3>
  <form action="{{route('order.update', $order->id)}}" method="post">
    @csrf
    @method('put')
    <div class="form-grid">

      <div class="form-group">
        <label for="products">Number of Products*</label>
        <input type="number" name="number_of_products" id="products" placeholder="e.g. 5" value="{{$order->number_of_products}}">
      </div>

      <div class="form-group">
        <label for="customer">Customer Name*</label>
        <input type="text" name="cutomerName" id="customer" placeholder="e.g. John Doe" value="{{$order->cutomerName}}">
      </div>

      <div class="form-group">
        <label for="mobile">Mobile Number*</label>
        <input type="tel" name="mobile_number" id="mobile" placeholder="e.g. +91 9876543210" value="{{$order->mobile_number}}">
      </div>

      <div class="form-group">
        <label for="bookby">Book By*</label>
        <input type="text" name="book_by" id="bookby" placeholder="e.g. D" value="{{$order->book_by}}">
      </div>

      <div class="form-group">
        <label for="mode">Order Mode*</label>
        <select id="mode" name="order_mode">
          <option value="">Select</option>
          <option value="B2C" {{ $order->order_mode == 'B2C' ? 'selected' : '' }}>B2C</option>
          <option value="B2B" {{ $order->order_mode == 'B2B' ? 'selected' : '' }}>B2B</option>
        </select>
      </div>

      <div class="form-group">
        <label for="time">Order Time*</label>
        <input type="time" name="time" id="time" value="{{$order->time}}">
      </div>

      <div class="form-group">
        <label for="startdate">Contract Start Date*</label>
        <input type="date" name="contract_start_date" id="startdate" min="{{ date('Y-m-d') }}" value="{{$order->contract_start_date}}">
      </div>

      <div class="form-group">
        <label for="enddate">Contract End Date*</label>
        <input type="date" name="contract_end_date" id="enddate" value="{{$order->contract_end_date}}">
      </div>

        <div class="form-group">
        <label for="status">Status*</label>
        <select id="status" name="status">
          <option value="">Select</option>
          <option value="Active" {{ $order->status == 'Active' ? 'selected' : '' }}>Active</option>
          <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>
        </div>

      <div class="form-group">
        <label for="address">Address*</label>
        <input type="text" name="address" id="address" placeholder="e.g. Near Ganesh Temple, Vasco, India" value="{{$order->address}}">
      </div>
    </div>

    <div class="form-actions">
      <button type="reset" class="btn-reset">Reset</button>
      <button type="submit" class="btn-submit">Update Order</button>
    </div>
  </form>
</div>

    @if($errors->any())
    <p>{{ $errors->first() }}</p>
    @endif

</body>
</html>