const numberFormat = new Intl.NumberFormat("vi-VN", {
  style: "currency",
  currency: "VND",
});
function changetrans(intrans) {
  var intransValue = numberFormat.format(intrans.value);
  document.querySelector("#trans-price").innerHTML = intransValue;
  var tmp_tong = document.getElementsByName("tmp_tong");
  var tong_tien = Number(tmp_tong[0].defaultValue) + Number(intrans.value);
  document.getElementById("tong_tien").innerHTML =
    numberFormat.format(tong_tien);
}
