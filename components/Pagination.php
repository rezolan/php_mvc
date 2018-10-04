<?

class Pagination {
	private $itemsCount, $countOnPage, $activePage, $lihksCount, $paginationPath;
	public function __construct($itemsCount, $countOnPage, $activePage, $paginationPath){
		$this->itemsCount = $itemsCount;
		$this->countOnPage = $countOnPage;
		$this->activePage = $activePage;
		$this->lihksCount = ceil($itemsCount/$countOnPage);
		$this->paginationPath = $paginationPath;
	}
	public function show() {
		$x = "<div style='display:flex;justify-content:center;'>";
		for($i = 1; $i <= $this->lihksCount; $i++){
			if($this->activePage==$i) {
				$x.="<button href='".$this->paginationPath."$i'>$i</button>";
			} else {
				$x.="<a href='".$this->paginationPath."$i'>$i</a>";
			}
		}
		$x.="</div>";
		return $x;
		// return (
			// "<div style='display:flex;justify-content:center;'>
				// <a href='".$this->paginationPath."1'>1</a>
				// <a href='".$this->paginationPath."2'>2</a>
				// <a href='".$this->paginationPath."3'>3</a>
				// <a href='".$this->paginationPath."4'>4</a>
				// <a href='".$this->paginationPath."5'>5</a>
			// </div>");
	}
}