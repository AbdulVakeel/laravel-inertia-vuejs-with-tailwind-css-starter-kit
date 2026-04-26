export default function useCurrencyFormatter() {
  const currencySymbol = "$"; 
  
  const formatNumber = (amount, precision = 2) => {
    return new Intl.NumberFormat('en-US', {
      minimumFractionDigits: precision,
      maximumFractionDigits: precision,
    }).format(amount);
  };

  // Symbol pehle ( $300.00 )
  const formatCurrencySymbol = (amount, precision = 2, userCurrency = currencySymbol) => {
    let curr = userCurrency ?? ''; 
    let val = formatNumber(amount, precision); 
    return `${curr}${val}`;  // 🔥 CHANGE: pehle symbol, phir number
  };
  
  // Symbol baad mein ( 300.00 $ ) - agar chahiye to
  const formatCurrencySuffix = (amount, precision = 2, userCurrency = currencySymbol) => {
    let curr = userCurrency ?? ''; 
    let val = formatNumber(amount, precision); 
    return `${val} ${curr}`;
  };

  return {
    formatCurrencySymbol,  // Returns "$300.00"
    formatCurrencySuffix,  // Returns "300.00 $"
    formatNumber,          // Returns "300.00"
  };
}