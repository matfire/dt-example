import $ from 'jquery'
import './styles/datatables.css'
import jszip from 'jszip';
import pdfmake from 'pdfmake';
import DataTable from 'datatables.net-dt'
import 'datatables.net-buttons-dt';
import 'datatables.net-buttons/js/buttons.colVis.mjs';
import 'datatables.net-buttons/js/buttons.html5.mjs';
import 'datatables.net-buttons/js/buttons.print.mjs';
import 'datatables.net-fixedcolumns-dt';
import 'datatables.net-fixedheader-dt';


const dTable = new DataTable("table[data-table]", {
    dom:"Blfrtip",
    buttons: ["copy", "csv", "excel", "pdf", "colvis"],
    language: {
        emptyTable:"Pas de données pour cette table",
        info: "Affiche les éléments _START_ à _END_ sur _TOTAL_",
        infoEmpty: "Affiche 0 éléments sur 0",
        search: "Chercher:",
        zeroRecords: "Aucun résultat corréspond à cette recherche",
        lengthMenu: "Affiche _MENU_ éléments",
        paginate: {
            first:"Début",
            last:"Fin",
            next:"Suivant",
            previous:"Précédant"
        }
    }
})