/**
 * Search for a contact by partially entered number and/or contact name. It is used on the contacts view page.
 *
 * Assumed that only the list of contacts will be received from the controller, without their number. The function updates the count of found contacts and forms a table of contacts, which it inserts into the page.
 * @param id
 */
function search(id) {
    $.ajax({
        type: 'POST',
        url: '/search',
        data: $('#searchForm').serialize(),

        success: function (result) {
            // console.log('search ok');
            var data = JSON.parse(result);
            var numberList = data.phones;

            Object.amountNumbers = function (obj) {
                var amountNumbers = 0, key, key2;
                for (key in obj) {
                    if (obj.hasOwnProperty(key)) amountNumbers++;
                }
                return amountNumbers;
            };

            var amountNumbers = Object.amountNumbers(numberList);

            document.getElementById('amountNumbers').textContent = amountNumbers;

            var newList = '';
            el = document.getElementById('contactListTbody');
            for (key in numberList) {
                var last_name = numberList[key].last_name;
                var phone = numberList[key].phone;
                newList += '<tr>';
                newList += '<td>' + phone + '</td>';
                newList += '<td>' + last_name + '</td>';
                newList += '</tr>';
            }
            el.innerHTML = newList;
        },
    });

}

/**
 * Search for a contact by partially entered number and/or contact name. It is used on the contacts edit page.
 *
 * Assumed that a list of contacts and their number will be received from the controller. The function updates counter contacts and displays contacts that satisfy the search condition by manipulating the css with the properties of the contact list.
 * @param id
 */
function search2(id) {
    $.ajax({
        type: 'POST',
        url: '/search',
        data: $('#searchForm').serialize(),

        success: function (result) {
            //console.log('search ok');
            var data = JSON.parse(result);
            //Contacts in contact list
            var numberList = data.phones;
            var amountNumbers = data.amount_numbers;

            document.getElementById('amountNumbers').textContent = amountNumbers;
            var tdNumbers = document.getElementsByClassName('tdNumber');

            for (var i = 0; i < tdNumbers.length; i++) {
                //Number in DOM
                var tdNumber = tdNumbers[i].innerText;

                flag = false;
                for (j = 0; j < amountNumbers; j++) {
                    //the Number from the search list
                    var numberInList = numberList[j]['phone'];
                    if (numberInList == tdNumber) {
                        flag = true;//true = included in the search list
                    }
                }
                if (flag == true) {
                    $(tdNumbers[i].parentElement).show();
                } else {
                    $(tdNumbers[i].parentElement).hide();
                }
            }
        },
    });
}
