import moment from "moment";

export default function useHelpers() {
    function convert_Title(text) {
        if (!text) return '';
        text = text.replace(/[_-]/g, ' ').replace(/\s+/g, ' ').trim();
        const words = text.toLowerCase().split(' ');
        return words.map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
    }

    function maskEmail(email) {
        if (!email) return 'Invalid email';
        const emailParts = email.split('@');
        if (emailParts.length !== 2) return 'Invalid email format';
        const emailName = emailParts[0];
        const maskedName = emailName.slice(0, 3) + emailName.slice(3).replace(/\w/g, '*');
        return maskedName + '@' + emailParts[1];
    }

    function formattedDate(date) {
        if (!date) return 'Invalid date';
        const parsedDate = new Date(date);
        if (isNaN(parsedDate)) return 'Invalid date format';
        return new Intl.DateTimeFormat('en-US', {
            year: 'numeric',
            month: 'short',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: true,
        }).format(parsedDate);
    }


    const formattedDateTime = (date) => {
        if (!date) return 'Invalid date';
        const parsedDate = new Date(date);
        if (isNaN(parsedDate)) return 'Invalid date format';
        return new Intl.DateTimeFormat('en-US', {
            year: 'numeric',
            month: 'short',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: true,
        }).format(parsedDate);
    };

    const timeAgo = (date) => {
        if (!date) return 'Invalid date';
        const parsedDate = new Date(date);
        const now = new Date();
        const diffInMs = now - parsedDate;
        const diffInDays = Math.floor(diffInMs / (1000 * 3600 * 24));
        if (diffInDays <= 0) {
            return 'Today';
        } else if (diffInDays === 1) {
            return '1 day ago';
        } else {
            return `${diffInDays} days ago`;
        }
    };

    const timeRemaining = (date) => {
        if (!date) return 'Invalid date';
        const parsedDate = new Date(date);
        if (isNaN(parsedDate)) return 'Invalid date format';
        const now = new Date();
        const diffInMs = parsedDate - now;
        const diffInDays = Math.floor(diffInMs / (1000 * 3600 * 24));
        if (diffInDays > 0) {
            return `${diffInDays} day${diffInDays > 1 ? 's' : ''} remaining`;
        } else if (diffInDays === 0) {
            return 'Expires today';
        } else {
            return 'Expired';
        }
    };

    function formatDate(date) {
        if (!date) return;

        const m = moment(date);
        if (!m.isValid()) return 'Invalid date format';

        return m.utc().format('DD-MM-YYYY | HH:mm');
    }

    return {
        convert_Title,
        maskEmail,
        formattedDateTime,
        formattedDate,
        timeAgo,
        timeRemaining,

        formatDate,
    };
}
