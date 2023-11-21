import { Controller } from "@hotwired/stimulus";
import '../styles/datatables.css'
import '../styles/buttons.bootstrap5.css'
import jszip from 'jszip';
import pdfmake from 'pdfmake';
import $ from 'jquery'
import DataTable from 'datatables.net-dt'
import 'datatables.net-bs5'
import 'datatables.net-buttons-dt';
import 'datatables.net-buttons-bs5'
import 'datatables.net-buttons/js/buttons.colVis.mjs';
import 'datatables.net-buttons/js/buttons.html5.mjs';
import 'datatables.net-buttons/js/buttons.print.mjs';
import 'datatables.net-fixedcolumns-dt';
import 'datatables.net-fixedheader-dt';


/* stimulusFetch: 'lazy' */
export default class extends Controller {
    static targets = ["table"]
    static values = {
        buttons: Array,
        disabled: Array
    }

    connect() {
        new DataTable(this.tableTarget, {
            buttons: ["colvis", ...this.buttonsValue],
            columnDefs: [{searchable:false, targets: this.disabledValue}],
            language: {
                emptyTable:"Pas de données pour cette table",
                info: "Affiche les éléments _START_ à _END_ sur _TOTAL_",
                infoEmpty: "Affiche 0 éléments sur 0",
                search: "Chercher:",
                zeroRecords: "Aucun résultat corréspond à cette recherche",
                lengthMenu: "Afficher _MENU_ éléments",
                paginate: {
                    first:"Début",
                    last:"Fin",
                    next:"Suivant",
                    previous:"Précédant"
                }
            }
        })
    }
}