function sortTable(table, dir, n) {
	var rows, switching, i, x, y, shouldSwitch, switchcount = 0;
	switching = true;
	/*Faça um loop que continuará até
	nenhuma troca foi feita:*/
	while (switching) {
		//comece dizendo: nenhuma troca é feita:
		switching = false;
		rows = table.rows;
		/*Faça um loop por todas as linhas da tabela (exceto o
		primeiro, que contém cabeçalhos da tabela):*/
		for (i = 1; i < (rows.length - 1); i++) {
			//comece dizendo que não deve haver alternância:
			shouldSwitch = false;
			/*Obtenha os dois elementos que você deseja comparar,
			um da linha atual e o outro da próxima:*/
			x = rows[i].getElementsByTagName("TD")[n];
			y = rows[i + 1].getElementsByTagName("TD")[n];
			/*verifique se as duas linhas devem mudar de lugar,
			com base na direção, asc ou desc:*/
			if (dir == "asc") {
				if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
					//Nesse caso, marque como uma opção e interrompa o loop:
					shouldSwitch = true;
					break;
				}
			} else if (dir == "desc") {
				if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
					//Nesse caso, marque como uma opção e interrompa o loop:
					shouldSwitch = true;
					break;
				}
			}
		}
		if (shouldSwitch) {
			/*Se um interruptor foi marcado, faça-o
			e marque que uma troca foi feita:*/
			rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
			switching = true;
			//Cada vez que uma troca for concluída, aumente essa contagem em 1:
			switchcount++;
		} else {
			/*Se nenhuma mudança foi feita E a direção for "asc",
			defina a direção para "desc" e execute o loop while novamente.*/
			if (switchcount == 0 && dir == "asc") {
				dir = "desc";
				switching = true;
			}
		}
	}
}

var tabela = document.getElementById('tabela');
sortTable(tabela, 'desc', 0);