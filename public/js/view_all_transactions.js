$(document).ready(function() {
    // Initializes the Data Table
    var transaction_table = $("#transactions_table");
    transaction_table.DataTable({
        order: [[0, 'desc']],
        paging: false
    });


    // Choosing a specific category for the transactions
    $(".category").click(function () {
        var transactions_body = $("#transactions_body");
        transaction_table.DataTable().destroy();
        $("#dd-menu-button").text(this.text);
        transactions_body.empty();
        var init_budget = parseFloat(budget[this.name]);
        console.log(init_budget);


        var first = true;
        for(var key in transactions){
            if(transactions.hasOwnProperty(key)){
                var number;
                if(this.name === "all"){
                    $("#running").remove();
                    number = parseFloat(transactions[key]['amount']).toFixed(2)
                        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                    transactions_body.append(
                        "<tr>" +
                        "   <td>" + transactions[key]['transaction_date'] + "</td>" +
                        "   <td>Term " + transactions[key]['term'] + "</td>" +
                        "   <td>" + transactions[key]['owner'] + "</td>" +
                        "   <td>" + transactions[key]['item_name'] + "</td>" +
                        "   <td>" + transactions[key]['description'] + "</td>" +
                        "   <td class='text-right'>P" + number + "</td>" +
                        "</tr>");
                }else if(transactions[key]['category'] === this.name){
                    if(first === true){
                        $("#table_head").append("<th id='running'>Running Balance</th>");

                    }
                    first = false;
                    number = parseFloat(transactions[key]['amount']);

                    var amount = number.toFixed(2)
                        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                    transactions_body.append(
                        "<tr>" +
                        "   <td>" + transactions[key]['transaction_date'] + "</td>" +
                        "   <td>Term " + transactions[key]['term'] + "</td>" +
                        "   <td>" + transactions[key]['owner'] + "</td>" +
                        "   <td>" + transactions[key]['item_name'] + "</td>" +
                        "   <td>" + transactions[key]['description'] + "</td>" +
                        "   <td class='text-right'>P" + amount + "</td>" +
                        "   <td class='text-right'>P" + (init_budget - number).toFixed(2)
                            .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + "</td>" +
                        "</tr>");
                }
            }
        }

        // Reinitializes the Data Table after fetching new data
        transaction_table.DataTable({
            order: [[0, 'desc']],
            paging: false
        });
    })
    
} );