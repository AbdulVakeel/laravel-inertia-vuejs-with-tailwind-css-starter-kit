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
    return `${curr}${val}`;
  };
  
  // Symbol baad mein ( 300.00 $ )
  const formatCurrencySuffix = (amount, precision = 2, userCurrency = currencySymbol) => {
    let curr = userCurrency ?? ''; 
    let val = formatNumber(amount, precision); 
    return `${val} ${curr}`;
  };

  // ========== ADD THIS: formatCurrency function ==========
  const formatCurrency = (amount, precision = 2) => {
    return formatCurrencySymbol(amount, precision);
  };

  return {
    formatCurrency,        // ← ADD THIS
    formatCurrencySymbol,
    formatCurrencySuffix,
    formatNumber,
  };
}