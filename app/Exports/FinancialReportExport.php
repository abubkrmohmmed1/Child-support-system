namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FinancialReportExport implements FromView
{
    public $results;
    public function __construct($results)
    {
        $this->results = $results;
    }
    public function view(): View
    {
        return view('accounts.reports_excel', [
            'results' => $this->results
        ]);
    }
}