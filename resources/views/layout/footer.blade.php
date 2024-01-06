<script src="{{asset('../assets/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->`
<script src="{{asset('../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('../assets/extra-libs/sparkline/sparkline.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('../dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('../dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('../dist/js/custom.min.js')}}"></script>
<!-- this page js -->
<script src="{{asset('../js/autocomplete.js')}}"></script>
<script src="{{asset('../assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
<script src="{{asset('../assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
<script src="{{asset('../assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('../assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('../assets/libs/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('../assets/libs/toastr/toastr.js')}}"></script>
<script src="{{asset('../assets/libs/toastr/build/toastr.min.js')}}"></script>
<script src="{{asset('../js/sweet-alert.js')}}"></script>
<script src="{{asset('../js/pagination.min.js')}}"></script>
<script src="{{asset('../js/pagination.js')}}"></script>
<script src="{{asset('../js/multiple-droplist.js')}}"></script>

<script>
    // let host = "http://192.168.0.15:5221";
    let host = "http://127.0.0.1:8000";
</script>
<script>
    function convertDateTime(isoTime, time){
        // let getDate = isoTime.split("T")[0].split("-").reverse().join("/"); 
        let getDate = new Date(isoTime).getDate()< 10 ? `0${new Date(isoTime).getDate()}` : new Date(isoTime).getDate();
        let getMonth = new Date(isoTime).getMonth()+1 < 10?`0${new Date(isoTime).getMonth()+1}`:new Date(isoTime).getMonth()+1;
        let getYear = new Date(isoTime).getFullYear();
        let getHour = new Date(isoTime).getHours() < 10 ? `0${new Date(isoTime).getHours()}` : new Date(isoTime).getHours();
        let getMinute = new Date(isoTime).getMinutes() < 10 ? `0${new Date(isoTime).getMinutes()}` : new Date(isoTime).getMinutes();;
        let getSecond = new Date(isoTime).getSeconds() < 10 ? `0${new Date(isoTime).getSeconds()}` : new Date(isoTime).getSeconds();;
        let result;
        if(time==undefined){
            result = `${getDate}/${getMonth}/${getYear}`;
        }else{
            result = `${getDate}/${getMonth}/${getYear} ${getHour}:${getMinute}:${getSecond}`;
        } 
        return result;
    }
    function decodeDatetime(isoTime){
        let getMonth = new Date(isoTime).getMonth()+1 < 10?`0${new Date(isoTime).getMonth()+1}`:new Date(isoTime).getMonth()+1;
        let getYear = new Date(isoTime).getFullYear();
        let result = `${getYear}${getMonth}`;
        return result;
    }
    function convertDateTimeDB(isoTime){
        let getDate = new Date(isoTime).getDate() < 10 ? `0${new Date(isoTime).getDate()}` : new Date(isoTime).getDate();
        let getMonth = new Date(isoTime).getMonth()+1 < 10?`0${new Date(isoTime).getMonth()+1}`:new Date(isoTime).getMonth()+1;
        let getYear = new Date(isoTime).getFullYear();
        let result = `${getYear}-${getMonth}-${getDate}`;
        return result;
    }
    function getCookie(cookieName) {
        var cookieValue = document.cookie;
        var cookieStart = cookieValue.indexOf(cookieName + '=');
        if (cookieStart === -1) {
            return null; // Cookie not found
        }
        cookieStart = cookieValue.indexOf('=', cookieStart) + 1;
        var cookieEnd = cookieValue.indexOf(';', cookieStart);
        if (cookieEnd === -1) {
            cookieEnd = cookieValue.length;
        }
        return decodeURIComponent(cookieValue.substring(cookieStart, cookieEnd));
    }
</script>