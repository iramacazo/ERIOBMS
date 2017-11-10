$(document).ready(function() {
    // Initializes the Data Table
    var transaction_table = $("#transactions_table");
    transaction_table.DataTable({
        order: [[0, 'desc']]
    });
    
    $(".category").click(function () {
        var transactions_body = $("#transactions_body")
        transaction_table.DataTable().destroy();
        $("#dd-menu-button").text(this.text);
        transactions_body.empty();
        console.log(transactions);


        for(var key in transactions){
            if(transactions.hasOwnProperty(key)){
                if(this.name === "all"){
                    transactions_body.append(
                        "<tr>" +
                        "   <td>" + transactions[key]['transaction_date'] + "</td>" +
                        "   <td>" + transactions[key]['term'] + "</td>" +
                        "   <td>" + transactions[key]['owner'] + "</td>" +
                        "   <td>" + transactions[key]['item_name'] + "</td>" +
                        "   <td>" + transactions[key]['description'] + "</td>" +
                        "   <td class='text-right'>" + transactions[key]['amount'] + "</td>" +
                        "</tr>");
                }else if(transactions[key]['category'] === this.name){
                    transactions_body.append(
                        "<tr>" +
                        "   <td>" + transactions[key]['transaction_date'] + "</td>" +
                        "   <td>" + transactions[key]['term'] + "</td>" +
                        "   <td>" + transactions[key]['owner'] + "</td>" +
                        "   <td>" + transactions[key]['item_name'] + "</td>" +
                        "   <td>" + transactions[key]['description'] + "</td>" +
                        "   <td class='text-right'>" + transactions[key]['amount'] + "</td>" +
                        "</tr>");
                }
            }
        }

        // Reinitializes the Data Table after fetching new data
        transaction_table.DataTable({
            order: [[0, 'desc']]
        });
    })
    
} );