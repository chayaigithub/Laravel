<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hommlie|Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="maincontainer">

        <div class="sidebar">
            <div class="img">
                <h1>Hommlie</h1>
            </div>

            <div class="nav">
                <ul>
                    <li><a href="#"><i class='bx  bxs-dashboard-alt'  ></i> Dashboard</a></li>
                    <li><a href="#" id="manageOrdersToggle"><i class='bx  bxs-cart'  ></i> Manage Orders <i class='bx  bx-chevron-left'  ></i> </a></li>

                    <div class="manageOrders">
                        <li><a href="{{route('orders')}}"><i class='bx  bxs-check-circle'  ></i> View Orders</a></li>
                        <li><a href="{{route('addorders')}}"><i class='bx  bxs-plus-circle'  ></i> Add Orders</a></li>
                        <li><a href="#"><i class='bx  bxs-check-circle'  ></i> View Buisness Region</a></li>
                        <li><a href="#"><i class='bx  bxs-check-circle'  ></i> View Service Center</a></li>
                    </div>

                    <li><a href="#"><i class='bx  bx-contact-book'  ></i>  Employee Attendence <i class='bx  bx-chevron-left'  ></i> </a></li>
                    <li><a href="#"><i class='bx  bxs-community'  ></i> Manage Customers <i class='bx  bx-chevron-left'  ></i> </a></li>
                </ul>
            </div>
        </div>

        <div class="container">
            <div class="topbar">
                <div>
                    <i class='bx  bxs-menu-wider'  ></i> 
                </div>

                <div class="btnss">
                <button>Gantt</button>
                <button>Orders</button>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn" type="submit">Logout</button>
                </form>
                </div>
            </div>

            <div class="content">
                <div class="section">
                    <div>
                        <p>{{$total_users ?? 0}}</p>
                        <p>Total Users</p>
                    </div>
                    <div>
                        <i class='bx  bxs-community'  ></i> 
                    </div>
                </div>

                <div class="section">
                    <div>
                        <p>{{$total_orders ?? 0}}</p>
                        <p>Total Orders</p>
                    </div>
                    <div>
                        <i class='bx  bxs-cart'  ></i> 
                    </div>
                </div>

                <div class="section">
                    <div>
                        <p>{{$completedOrders ?? 0}}</p>
                        <p>Total Completed Orders</p>
                    </div>
                    <div>
                        <i class='bx  bxs-check-circle'  ></i> 
                    </div>
                </div>

                <div class="section">
                    <div>
                        <p>0</p>
                        <p>Total Employees</p>
                    </div>
                    <div>
                        <i class='bx  bx-contact-book'  ></i>  
                    </div>
                </div>

                <div class="section">
                    <div>
                        <p>{{$totalProducts ?? 0}}</p>
                        <p>Total Products</p>
                    </div>
                    <div>
                        <i class='bx  bxs-briefcase-alt-2'  ></i> 
                    </div>
                </div>

                <div class="section">
                    <div>
                        <p>{{$todaysOrders ?? 0}}</p>
                        <p>Today's Orders</p>
                    </div>
                    <div>
                        <i class='bx  bxs-calendar-check'  ></i> 
                    </div>
                </div>

                <div class="section">
                    <div>
                        <p>0</p>
                        <p>Tommorow's Orders</p>
                    </div>
                    <div>
                        <i class='bx  bxs-calendar-alt'  ></i> 
                    </div>
                </div>

                <div class="section">
                    <div>
                        <p>0</p>
                        <p>Total Complaints</p>
                    </div>
                    <div>
                        <i class='bx  bxs-message-circle-exclamation'  ></i> 
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table">
                <h3>Recent Orders</h3>
                <table>
                <tbody>
                    <tr>
                        <th>Order Number</th>
                        <th>Number of Products</th>
                        <th>Customer</th>
                        <th>Mobile</th>
                        <th>Order Total</th>
                        <th>Date</th>
                    </tr>

                    @foreach ($orders as $order)
                        <tr>
                        <td>{{$order->order_number}}</td>
                        <td>{{$order->number_of_products}}</td>
                        <td>{{$order->cutomerName}}</td>
                        <td>{{$order->mobile_number}}</td>
                        <td>{{$order->order_total}}</td>
                        <td>{{$order->date}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

        <script>

        const toggle = document.getElementById("manageOrdersToggle");
        const submenu = document.querySelector(".manageOrders");

        toggle.addEventListener("click", function (e) {
            e.preventDefault();
            submenu.classList.toggle("open");
            if (submenu.classList.contains("open")) {
                toggle.innerHTML = "<i class='bx  bxs-cart'  ></i> Manage Orders <i class='bx  bx-chevron-down'  ></i> ";
            } else {
                toggle.innerHTML = "<i class='bx  bxs-cart'  ></i> Manage Orders <i class='bx  bx-chevron-left'  ></i> ";
            }
        });

        </script>
</body>
</html>