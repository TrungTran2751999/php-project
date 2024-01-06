@include('layout/header')
@include('layout/topbar')
@include('layout/leftbar')
<body>
    <div class="page-wrapper">
        <div class="col-12">
            <div class="card">
                <table class="table" id="table-data">
                    <thead>
                        <th>STT</th>
                        <th>TÊN ORGANIZER</th>
                        <th>TÊN VIẾT TẮT</th>
                        <th>AVARTAR</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>12121</td>
                            <td>SKT T1</td>
                            <td>Saigon T2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('layout/footer')
    <script>
        $.ajax({
            url: host + "/api/organizer"
        })
        .done(res=>{
            let rows = "";
            for(let i=0; i<res.length; i++){
                let row = `
                <tr>
                    <td>${i+1}</td>
                    <td><a href="/admin/organizer/update?id=${res[i].id}">${res[i].name}</a></td>
                    <td>${res[i].tenVietTat}</td>
                    <td><image src="https://drive.google.com/uc?export=view&id=${res[i].image}" width=100px height=100px/></td>
                </tr>
                `;
                rows+=row;
            }
            $("#table-data tbody").html(rows);
        })
    </script>
</body>