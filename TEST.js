$(function(){

let button = $("#button");

function geekOne(y) { alert(y); }
function geekTwo(alert, callback) {
    callback(alert);        
}
geekTwo(111, geekOne);

// button.click(function(){
//     new swal({
//         title: 'Are you sure?',
//         text: "Once deleted, you will not be able to recover this item!",
//         icon: "warning",
//         confirmButtonText: 'Delete',
//         cancelButtonText: 'Cancel',
//         confirmButtonColor: '#DD6B55',
//         showCancelButton: true
//       }).then(function(result) {
//         if (result.value) {
//           new swal({
//             text:"Item has been deleted!", 
//             icon: "success",
//           });
//           console.log('button A pressed')
//         } else {
//           console.log('button B pressed')
//         }
//       })
// })

// })

// swal({
//     title: "Are you sure?",
//     text: "Once deleted, you will not be able to recover this imaginary file!",
//     icon: "warning",
//     buttons: true,
//     dangerMode: true,
//   })
//   .then((willDelete) => {
//     if (willDelete) {
//       swal("Poof! Your imaginary file has been deleted!", {
//         icon: "success",
//       });
//     } else {
//       swal("Your imaginary file is safe!");
//     }
  });