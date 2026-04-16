export default function useCurrencyFormatter() {
  const currencySymbol = "$"; 
  const formatNumber = (amount, precision) => {
    return new Intl.NumberFormat('en-US', {
      minimumFractionDigits: precision,
      maximumFractionDigits: precision,
    }).format(amount);
  };

  const formatCurrency = (amount, precision = 2, userCurrency = currencySymbol) => {
    let curr = userCurrency ?? ''; 
    let val = formatNumber(amount, precision); 

    return `${val} ${curr}`; 
  };

  const formatCurrencySymbol = (amount, precision = 2, userCurrency = currencySymbol) => {
    let curr = userCurrency ?? ''; 
    let val = formatNumber(amount, precision); 

    return `${val} ${curr}`; 
  };
  return {
    formatCurrency,
    formatCurrencySymbol,
    formatNumber, 
  };
}
