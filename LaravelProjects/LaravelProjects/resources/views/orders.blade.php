<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders</title>
  <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f8f9fa;
      margin: 0;
      padding: 20px;
    }

    .header{
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .home{
      background-color: green;
      padding: 10px 14px;
      display: inline-block;
      border-radius: 4px;
    }

    .home a{
      text-decoration: none;
      color: white;
    }

    .orders-container {
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    h2 {
      margin-bottom: 20px;
      font-size: 20px;
      color: #333;
    }


    .filters {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      margin-bottom: 20px;
    }

    .filters form input[type="text"],
    .filters form input[type="date"] {
      padding: 8px 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      flex: 1;
      min-width: 300px;
    }

    .filters form input[type="text"]{
      min-width: 400px;
    }

    .filters button {
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
    }

    .filters .show-btn {
      background: #006d40;
      color: #fff;
    }

    .filters .search-btn {
      background: #006d40;
      color: #fff;
    }

    .filters .reset-btn {
      background: #006dff;
      color: #fff;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      font-size: 14px;
    }

    thead {
      background: #f1f3f5;
    }

    th, td {
      padding: 10px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    tr:hover {
      background: #f9f9f9;
    }

    .edit-delete{
      display: flex;
      gap: 20px;
      justify-content: center;
    }

    .edit-delete a{
      text-decoration: none;
    }

    .edit-delete button{
      border: none;
      background: none;
    }

    .edit-delete .edit{
      color: blue;
    }

    .edit-delete .delete{
      color: red;
    }


    .badge {
      padding: 4px 8px;
      border-radius: 4px;
      font-size: 12px;
      font-weight: bold;
      color: #fff;
    }

    .badge.active {
      background: #006d40;
    }

    .badge.b2c {
      background: #d9534f;
    }

    .bookby{
        background-color: #0ac70a;
        color: white;
        padding: 4px 6px;
        border-radius: 50%;
        font-size: 12px;
    }

    .table-info {
      margin-top: 10px;
      font-size: 13px;
      color: #666;
    }
  </style>
</head>
<body>
<div class="orders-container">

<div class="header">
    <h2>Orders</h2>
  <div class="home">
      <a href="{{route('dashboard')}}">Dashboard</a>
  </div>
</div>

<div class="filters">
    <form method="GET" action="{{ route('orders') }}">
        <input type="date" name="start_date" value="{{ request('start_date') }}">
        <input type="date" name="end_date" value="{{ request('end_date') }}">
        <button type="submit" class="show-btn">Show</button>
    </form>
    
    <form method="GET" action="{{ route('orders') }}">
        <input type="text" name="search" placeholder="Search by order number, name or mobile" value="{{ request('search') }}">
        <button type="submit" class="search-btn">Search</button>

        <button type="reset" class="reset-btn">Reset</button>
    </form>
</div>


  <table>
    <thead>
      <tr>
        <th>Status</th>
        <th>Customer ID</th>
        <th>Order number</th>
        <th>Book By</th>
        <th>Order Mode</th>
        <th>Number of products</th>
        <th>Customer</th>
        <th>Mobile</th>
        <th>Order total</th>
        <th>Contract Start Date</th>
        <th>Contract End Date</th>
        <th>Edit/Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
        <td><span class="badge active">{{$order->status}}</span></td>
        <td>{{$order->customer_id}}</td>
        <td>{{$order->order_number}}</td>
        <td><span class="bookby">{{$order->book_by}}</span></td>
        <td><span class="badge b2c">{{$order->order_mode}}</span></td>
        <td>{{$order->number_of_products}}</td>
        <td>{{$order->cutomerName}}</td>
        <td>{{$order->mobile_number}}</td>
        <td>{{$order->order_total}}</td>
        <td>{{$order->contract_start_date}}</td>
        <td>{{$order->contract_end_date}}</td>
        <td class="edit-delete">
          <a href="{{route('order.edit', ['order' => $order])}}" class="edit"><i class='bx  bx-edit'  ></i> </a>
          <form action="{{route('order.delete', ['order' => $order])}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="delete"><i class='bx  bx-trash'  ></i></button>
          </form>
        </td>
      </tr>
        @endforeach
    </tbody>
  </table>

</div>
</body>
</html>
